<?php

namespace Modules\Fees\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Fees\Entities\Fee;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable 
     */
    public function index()
    {
        return view('fees::index');
    }

    public function feeStructure()
    {
        return view('fees::fee_structure');
    } 
    /**
     * This function gets receipt for particular student paid
     */
    public function generateReceipt($receipt_id){
        return view('fees::receipt',compact('receipt_id'));
    }
    public function printReceipt($receipt_id)
    {

        $print_receipts= Fee::join('users', 'users.id', 'fees.user_id')
        ->join('students', 'students.id', 'fees.student_id')
        ->join('classes', 'classes.id', 'fees.class_id')
        ->where('fees.id',$receipt_id)
        ->get(['fees.*','users.name','students.first_name','students.last_name','students.other_names','students.gender','classes.level']);
        return view('fees::print_receipt_now',compact('print_receipts'));
    }
    public static function convert_number_to_words($receipt_id) {

        $hyphen      = '-';
        $conjunction = ' and ';
        $separator   = ', ';
        $negative    = 'negative ';
        $decimal     = ' point ';
        $dictionary  = array(
            0                   => 'zero',
            1                   => 'one',
            2                   => 'two',
            3                   => 'three',
            4                   => 'four',
            5                   => 'five',
            6                   => 'six',
            7                   => 'seven',
            8                   => 'eight',
            9                   => 'nine',
            10                  => 'ten',
            11                  => 'eleven',
            12                  => 'twelve',
            13                  => 'thirteen',
            14                  => 'fourteen',
            15                  => 'fifteen',
            16                  => 'sixteen',
            17                  => 'seventeen',
            18                  => 'eighteen',
            19                  => 'nineteen',
            20                  => 'twenty',
            30                  => 'thirty',
            40                  => 'fourty',
            50                  => 'fifty',
            60                  => 'sixty',
            70                  => 'seventy',
            80                  => 'eighty',
            90                  => 'ninety',
            100                 => 'hundred',
            1000                => 'thousand',
            1000000             => 'million',
            1000000000          => 'billion',
            1000000000000       => 'trillion',
            1000000000000000    => 'quadrillion',
            1000000000000000000 => 'quintillion'
        );

        if (!is_numeric($receipt_id)) {
            return false;
        }

        if (($receipt_id >= 0 && (int) $receipt_id < 0) || (int) $receipt_id < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($receipt_id < 0) {
            return $negative . Self::convert_number_to_words(abs($receipt_id));
        }

        $string = $fraction = null;

        if (strpos($receipt_id, '.') !== false) {
            list($receipt_id, $fraction) = explode('.', $receipt_id);
        }

        switch (true) {
            case $receipt_id < 21:
                $string = $dictionary[$receipt_id];
                break;
            case $receipt_id < 100:
                $tens   = ((int) ($receipt_id / 10)) * 10;
                $units  = $receipt_id % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $receipt_id < 1000:
                $hundreds  = $receipt_id / 100;
                $remainder = $receipt_id % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . Self::convert_number_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($receipt_id, 1000)));
                $numBaseUnits = (int) ($receipt_id / $baseUnit);
                $remainder = $receipt_id % $baseUnit;
                $string = Self::convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= Self::convert_number_to_words($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $receipt_id) {
                $words[] = $dictionary[$receipt_id];
            }
            $string .= implode(' ', $words);
        }

        return $string;
    }
    /**
     * This function gets a form for clear school fees payment
     */
    public function clearPayment($payment_id){
        return view('fees::clear_payments_form',compact('payment_id'));
    }
}
