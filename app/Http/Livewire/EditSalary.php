<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Salary\Entities\Salary;
use Modules\Staff\Entities\Staff;

class EditSalary extends Component
{
    //validate category
    protected $rules = [
        'staff_id'      =>'required',
        'quantity'      => 'required',
        'amount'        => 'required',
        'paid_on_date'  => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'staff_id.required' => 'staff_id is required',
        'quantity.required' => 'Quantity is required',
        'amount.required' => 'Amount is required',
        'paid_on_date.required' => 'Date of Payment is required',
    ];
    public function render()
    {
        return view('livewire.edit-salary',[
            'edit_Salary' =>Salary::editSalary($this->salary_id),
            'staffs' =>Staff::get()
        ]);
    }
    /**
     * This function displays data to be edited
     */
    public function mount($salary_id)
    {
        $this->fill([
            'staff_id' => Salary::editSalary($this->salary_id)->value('staff_id'),
            'quantity' => Salary::editSalary($this->salary_id)->value('quantity'),
            'amount' => Salary::editSalary($this->salary_id)->value('amount'),
            'paid_on_date' => Salary::editSalary($this->salary_id)->value('paid_on_date'),
        ]);
    }

    /**
     * This function updates Salary
     */
    public function updateSalary()
    {
        $this->validate();
        Salary::updateSalaryInfo($this->salary_id,$this->staff_id,$quantity,$this->amount,$this->paid_on_date);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to(url()->previous())->with('msg', 'Your Salary info has been edited successfully');
    }
}
