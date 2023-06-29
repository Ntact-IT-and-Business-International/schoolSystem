<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Fees\Entities\Fee;
use Modules\Students\Entities\Student;

class EditFees extends Component
{
    //validate category
    protected $rules = [
        'student_id'       => 'required',
        'amount_paid'   => 'required',
        'balance'     => 'required',
        'mode_of_payment'  => 'required',
        'payment_code'  => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'student_id.required' => 'Student id is required',
        'amount_paid.required' => 'Amount paid is required',
        'balance.required' => 'Balance is required',
        'mode_of_payment.required' => 'Mode of Payment is required',
        'payment_code.required' => 'Payment Code is required',
    ];
    public function render()
    {
        return view('livewire.edit-fees',[
            'edit_fees' =>Fee::editFees($this->fee_id),
            'students' =>Student::get()
        ]);
    }
    /**
     * This function displays data to be edited
     */
    public function mount($fee_id)
    {
        $this->fill([
            'staff_id' => Fee::editFee($this->fee_id)->value('staff_id'),
            'amount_paid' => Fee::editFee($this->fee_id)->value('amount_paid'),
            'balance' => Fee::editFee($this->fee_id)->value('balance'),
            'mode_of_payment' => Fee::editFee($this->fee_id)->value('mode_of_payment'),
            'payment_code' => Fee::editFee($this->fee_id)->value('payment_code'),
        ]);
    }

    /**
     * This function updates Fees
     */
    public function updateFees()
    {
        $this->validate();
        Fee::updateFeesInfo($this->fee_id,$this->student_id,$this->amount_paid,$this->balance,$this->mode_of_payment,$this->payment_code,$this->date_of_payment);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to(url()->previous())->with('msg', 'Your Fees info has been edited successfully');
    }
}
