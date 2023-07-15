<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Staff\Entities\Staffs;
use Modules\Class\Entities\Classes;
use Modules\Subject\Entities\Subject;

class EditStaff extends Component
{
    public $staff_first_name;
    public $staff_last_name;
    public $staff_other_names;
    public $class_id;
    public $date_of_birth;
    public $gender;
    public $phone_number;
    public $staff_email;
    public $nin;
    public $qualification;
    public $subject_id;
    public $registration_number;
    public $title;
    public $documents;
    public $salary;
    public $staff_id;

    //validate category
    protected $rules = [
        'class_id'             => 'required',
        'staff_first_name'     => 'required',
        'staff_last_name'      => 'required',
        'staff_other_names'    => '',
        'date_of_birth'        => 'required',
        'gender'               => 'required',
        'phone_number'         => 'required',
        'staff_email'          => '',
        'nin'                  => 'required',
        'qualification'        => 'required',
        'subject_id'           =>'',
        'registration_number'  =>'required',
        'title'                =>'required',
        'documents'            =>'',
        'salary'               =>'required',
    ];

    public function render()
    {
        return view('livewire.edit-staff',[
            'subjects'=>Subject::get(),
            'classes'=>Classes::get(),
            'edit_staff' => Staffs::editStaff($this->staff_id),
        ]);
    }
    /**
     * This function displays data to be edited
     */
    public function mount($staff_id)
    {
        $this->fill([
            'class_id'   => Staffs::editStaff($this->staff_id)->value('class_id'),
            'staff_first_name' => Staffs::editStaff($this->staff_id)->value('staff_first_name'),
            'staff_last_name'  => Staffs::editStaff($this->staff_id)->value('staff_last_name'),
            'staff_other_names'=> Staffs::editStaff($this->staff_id)->value('staff_other_names'),
            'date_of_birth' => Staffs::editStaff($this->staff_id)->value('date_of_birth'),
            'gender' => Staffs::editStaff($this->staff_id)->value('gender'),
            'phone_number' => Staffs::editStaff($this->staff_id)->value('phone_number'),
            'nin' => Staffs::editStaff($this->staff_id)->value('nin'),
            'staff_email' => Staffs::editStaff($this->staff_id)->value('staff_email'),
            'qualification' => Staffs::editStaff($this->staff_id)->value('qualification'),
            'subject_id' => Staffs::editStaff($this->staff_id)->value('subject_id'),
            'registration_number' => Staffs::editStaff($this->staff_id)->value('registration_number'),
            'title' => Staffs::editStaff($this->staff_id)->value('title'),
            'salary' => Staffs::editStaff($this->staff_id)->value('salary'),
        ]);
    }

    /**
     * This function updates subject
     */
    public function updateStaff()
    {
        $this->validate();
        Staffs::updateStaffInfo($this->staff_id,$this->staff_first_name,$this->staff_last_name,$this->staff_other_names,
        $this->class_id,$this->date_of_birth,$this->gender,$this->phone_number,$this->staff_email,$this->nin,
        $this->qualification,$this->subject_id,$this->registration_number,$this->title,$this->salary);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to('/staff/teaching-staff')->with('msg', 'Staff info has been edited successfully');
    }
}
