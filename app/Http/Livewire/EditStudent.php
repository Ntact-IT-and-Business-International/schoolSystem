<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Students\Entities\Student;
use Modules\Class\Entities\Classes;

class EditStudent extends Component
{
    public $class_id;
    public $first_name;
    public $last_name;
    public $other_names;
    public $date_of_birth;
    public $gender;
    public $special_need;
    public $parents_name;
    public $contact;
    public $nin;
    public $location;
    public $section;

    //validate category
    protected $rules = [
        'class_id'       => 'required',
        'first_name'     => 'required',
        'last_name'      => 'required',
        'other_names'    => '',
        'date_of_birth'  => 'required',
        'gender'         => 'required',
        'special_need'   => '',
        'parents_name'   => 'required',
        'contact'        => 'required',
        'nin'            => 'required',
        'location'       => 'required',
        'section'        => 'required',
    ];
    public function render()
    {
        return view('livewire.edit-student',[
            'edit_student' => Student::editStudent($this->student_id),
        ]);
    }
    /**
     * This function displays data to be edited
     */
    public function mount($student_id)
    {
        $this->fill([
            'class_id'   => Student::editStudent($this->student_id)->value('class_id'),
            'first_name' => Student::editStudent($this->student_id)->value('first_name'),
            'last_name'  => Student::editStudent($this->student_id)->value('last_name'),
            'other_names'=> Student::editStudent($this->student_id)->value('other_names'),
            'date_of_birth' => Student::editStudent($this->student_id)->value('date_of_birth'),
            'gender' => Student::editStudent($this->student_id)->value('gender'),
            'special_need' => Student::editStudent($this->student_id)->value('special_need'),
            'parents_name' => Student::editStudent($this->student_id)->value('parents_name'),
            'contact' => Student::editStudent($this->student_id)->value('contact'),
            'nin' => Student::editStudent($this->student_id)->value('nin'),
            'location' => Student::editStudent($this->student_id)->value('location'),
            'section' => Student::editStudent($this->student_id)->value('section'),
        ]);
    }

    /**
     * This function updates subject
     */
    public function updateStudent()
    {
        $this->validate();
        Student::updateStudentInfo($this->student_id,$this->first_name,$this->last_name,$this->other_names,$this->class_id,$this->date_of_birth,$this->gender,$this->special_need,$this->parents_name,$this->contact,$this->nin,$this->location,$this->section);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to(url()->previous())->with('msg', 'Student info has been edited successfully');
    }
}
