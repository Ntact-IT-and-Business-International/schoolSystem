<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Expenditure\Entities\Salary;
use Modules\Staff\Entities\Staffs;
use LivewireUI\Modal\ModalComponent;
use Session;

class AddSalary extends ModalComponent
{
    public $staff_id;
    public $quantity;
    public $amount;
    public $paid_on_date;
    public $actual_salary;

    //validate category
    protected $rules = [
        'staff_id'       => 'required',
        'quantity'       => 'required',
        'actual_salary'   => 'required',
        'amount'     => 'required',
        'paid_on_date'  => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'staff_id.required' => 'staff_id is required',
        'quantity.required' => 'Quantity is required',
        'actual_salary.required' => 'Actual Salary is required',
        'amount.required' => 'Amount is required',
        'paid_on_date.required' => 'Date of Payment is required',
    ];

    public function render()
    {
        return view('livewire.add-salary',[
            'staffs' =>Staffs::get()
        ]);
    }
    /**
     * This function creates Salary
     */
    public function submit()
    {
        $this->validate();
        $this->emit('Salaries', 'refreshComponent');
        Salary::addSalary($this->staff_id,$this->quantity,$this->actual_salary,$this->amount,$this->paid_on_date);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Salaries creation is successful');
    }
}
