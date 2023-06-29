<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Staff\Entities\Staff;
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
    public $location;
    public $qualification;
    public $subject_id;
    public $registration_number;
    public $title;
    public $documents;
    public $salary;

    //validate category
    protected $rules = [
        'class_id'             => 'required',
        'staff_first_name'     => 'required',
        'staff_last_name'      => 'required',
        'staff_other_names'    => '',
        'date_of_birth'        => 'required',
        'gender'               => 'required',
        'phone_number'         => 'required|unique:staffs',
        'staff_email'          => '',
        'nin'                  => 'required',
        'location'             => 'required',
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
            'edit_staff' => Staff::editStaff($this->staff_id),
        ]);
    }
    /**
     * This function displays data to be edited
     */
    public function mount($staff_id)
    {
        $this->fill([
            'class_id'   => Staff::editStaff($this->staff_id)->value('class_id'),
            'staff_first_name' => Staff::editStaff($this->staff_id)->value('staff_first_name'),
            'staff_last_name'  => Staff::editStaff($this->staff_id)->value('staff_last_name'),
            'staff_other_names'=> Staff::editStaff($this->staff_id)->value('staff_other_names'),
            'date_of_birth' => Staff::editStaff($this->staff_id)->value('date_of_birth'),
            'gender' => Staff::editStaff($this->staff_id)->value('gender'),
            'phone_number' => Staff::editStaff($this->staff_id)->value('phone_number'),
            'nin' => Staff::editStaff($this->staff_id)->value('nin'),
            'location' => Staff::editStaff($this->staff_id)->value('location'),
            'qualification' => Staff::editStaff($this->staff_id)->value('qualification'),
            'subject_id' => Staff::editStaff($this->staff_id)->value('subject_id'),
            'registration_number' => Staff::editStaff($this->staff_id)->value('registration_number'),
            'title' => Staff::editStaff($this->staff_id)->value('title'),
            'salary' => Staff::editStaff($this->staff_id)->value('salary'),
        ]);
    }

    /**
     * This function updates subject
     */
    public function updateStaff()
    {
        $this->validate();
        Staff::updateStaffInfo($staff_id,$staff_first_name,$staff_last_name,$staff_other_names,
        $class_id,$date_of_birth,$gender,$phone_number,$staff_email,$nin,$location,
        $qualification,$subject_id,$registration_number,$title,$salary);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to(url()->previous())->with('msg', 'Staff info has been edited successfully');
    }
}
