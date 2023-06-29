<?php

namespace Modules\Fees\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Fees\Database\factories\FeeFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('students.first_name', 'like', '%'.$val.'%')
        ->orWhere('students.last_name', 'like', '%'.$val.'%')
        ->orWhere('students.other_names', 'like', '%'.$val.'%')
        ->orWhere('classes.level', 'like', '%'.$val.'%')
        ->orWhere('amount_paid', 'like', '%'.$val.'%')
        ->orWhere('balance', 'like', '%'.$val.'%')
        ->orWhere('mode_of_payment', 'like', '%'.$val.'%')
        ->orWhere('payment_code', 'like', '%'.$val.'%')
        ->orWhere('date_of_payment', 'like', '%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the payments
     */
    public static function addPayment($student_id,$class_id,$amount_paid,$balance,$mode_of_payment,$payment_code,$date_of_payment){
        Fee::create([
            'student_id'      =>$student_id,
            'class_id'        =>$class_id,
            'amount_paid'     =>$amount_paid,
            'balance'         =>$balance,
            'mode_of_payment' =>$mode_of_payment,
            'payment_code'    =>$payment_code,
            'date_of_payment' =>$date_of_payment,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets all payments  
     */
    public static function getFees($search, $sortBy, $sortDirection, $perPage)
    {
        return Fee::join('users', 'users.id', 'fees.user_id')
        ->join('students', 'students.id', 'fees.student_id')
        ->join('classes', 'classes.id', 'fees.class_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['fees.*','users.name','students.first_name','students.last_name','students.other_names','classes.level']);
    }
    /**
     * This function gets form for editing payments information
     */
    public static function editFees($fee_id)
    {
        return Fee::whereId($fee_id)->get();
    }

    /**
     * This function updates the edited payments
     */
    public static function updateFeesInfo($fee_id,$student_id,$amount_paid,$balance,$mode_of_payment,$payment_code,$date_of_payment)
    {
        Fee::whereId($fee_id)->update([
            'student_id'      => $student_id,
            'amount_paid'     => $amount_paid,
            'balance'         => $balance,
            'mode_of_payment' => $mode_of_payment,
            'payment_code'    => $payment_code,
            'date_of_payment' => $date_of_payment,
            'user_id'         =>auth()->user()->id,
        ]);
    }
}
