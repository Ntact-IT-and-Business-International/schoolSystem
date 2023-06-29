<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Fees\Entities\Fee;
use Modules\Students\Entities\Student;
use Modules\Class\Entities\Classes;
use LivewireUI\Modal\ModalComponent;
use Session;

class AddFees extends ModalComponent
{
    public $student_id;
    public $amount_paid;
    public $balance;
    public $mode_of_payment;
    public $payment_code;
    public $class_id;
    public $date_of_payment;

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
        return view('livewire.add-fees',[
            'students' =>Student::get(),
            'classes' =>Classes::get()
        ]);
    }
    /**
     * This function creates Fees
     */
    public function submit()
    {
        $this->validate();
        $this->emit('Fees', 'refreshComponent');
        Fee::addPayment($this->student_id,$this->class_id,$this->amount_paid,$this->balance,$this->mode_of_payment,$this->payment_code,$this->date_of_payment);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Fees creation is successful');
    }
}
