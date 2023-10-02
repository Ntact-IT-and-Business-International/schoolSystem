<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Fees\Entities\Fee;
use Modules\Class\Entities\Classes;
use Session;

class EditSchoolFees extends Component
{
    public $fee_id;
    public $balance;
    public $mode_of_payment;
    public $payment_code;
    public $amount_paid;
    public $date_of_payment;
    public $term;
    public $class_id;
    
    protected $rules = [
        'term'            => 'required',
        'class_id'        => '',
        'balance'         => 'required',
        'mode_of_payment' => 'required',
        'payment_code'    => 'required',
        'amount_paid'     => 'required',
        'date_of_payment' => 'required',
    ];
    public function render()
    {
        return view('livewire.edit-school-fees',[
            'fees' =>Fee::editFees($this->fee_id),
            'classes'=>Classes::get()
        ]);
    }
    /**
     * This function displays data to be edited
     */
    public function mount($fee_id)
    {
        $this->fill([
            'class_id'   => Fee::editFees($this->fee_id)->value('class_id'),
            'balance'      => Fee::editFees($this->fee_id)->value('balance'),
            'mode_of_payment' => Fee::editFees($this->fee_id)->value('mode_of_payment'),
            'payment_code' => Fee::editFees($this->fee_id)->value('payment_code'),
            'amount_paid' => Fee::editFees($this->fee_id)->value('amount_paid'),
            'date_of_payment' => Fee::editFees($this->fee_id)->value('date_of_payment'),
            'term' => Fee::editFees($this->fee_id)->value('term'),
        ]);
    }

    /**
     * This function updates library
     */
    public function updateFees()
    {
        $this->validate();
        Fee::updateFeesInfo($this->fee_id,$this->class_id,$this->balance,$this->payment_code,$this->mode_of_payment,$this->date_of_payment,$this->amount_paid,$this->term);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to('/fees/school-fees')->with('msg', 'Your Fees info has been edited successfully');
    }
}
