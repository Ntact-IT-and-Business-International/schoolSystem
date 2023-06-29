<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Modules\Carteen\Entities\CarteenDeposit;
use Modules\Students\Entities\Student;
use Session;

class AddCarteenDeposit extends ModalComponent
{
    public $student_id;
    public $term;
    public $amount_deposited;
    public $date_of_deposit;

    //validate category
    protected $rules = [
        'student_id'       => 'required',
        'term'             => 'required',
        'amount_deposited' => 'required',
        'date_of_deposit'  => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'term.required' => 'Term  is required',
        'amount_deposited.required' => 'Amount  is required',
        'date_of_deposit.required' => 'Date  is required',
    ];

    public function render()
    {
        return view('livewire.add-carteen-deposit',[
            'students'=>Student::get()
        ]);
    }
    /**
     * This function creates Carteen deposit
     */
    public function submit()
    {
        $this->validate();
        $this->emit('CarteenDeposit', 'refreshComponent');
        CarteenDeposit::addCarteenDeposit($this->student_id,$this->term,$this->amount_deposited,$this->date_of_deposit);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Operation is successful');
    }
}
