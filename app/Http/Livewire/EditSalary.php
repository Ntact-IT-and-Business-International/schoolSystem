<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Expenditure\Entities\Salary;
use Modules\Staff\Entities\Staffs;

class EditSalary extends Component
{
    public $amount;
    public $actual_salary;
    public $salary_id;
    public $paid_on_date;
    public $staff_id;
    //validate category
    protected $rules = [
        'actual_salary' => 'required',
        'amount'        => 'required',
        'paid_on_date'  => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'actual_salary.required' => 'Actual Salary is required',
        'amount.required' => 'Amount is required',
        'paid_on_date.required' => 'Date of Payment is required',
    ];
    public function render()
    {
        return view('livewire.edit-salary',[
            'edit_Salary' =>Salary::editSalary($this->salary_id),
            'staffs' =>Staffs::get()
        ]);
    }
    /**
     * This function displays data to be edited
     */
    public function mount($salary_id)
    {
        $this->fill([
            'staff_id' => Salary::editSalary($this->salary_id)->value('staff_id'),
            'amount' => Salary::editSalary($this->salary_id)->value('amount'),
            'actual_salary' => Salary::editSalary($this->salary_id)->value('actual_salary'),
            'paid_on_date' => Salary::editSalary($this->salary_id)->value('paid_on_date'),
        ]);
    }

    /**
     * This function updates Salary
     */
    public function updateSalary()
    {
        $this->validate();
        Salary::updateSalaryInfo($this->salary_id,$this->staff_id,$this->actual_salary,$this->amount,$this->paid_on_date);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to('/expenditure/salaries')->with('msg', 'Your Salary info has been edited successfully');
    }
}
