<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Class\Entities\Classes;
use LivewireUI\Modal\ModalComponent;
use Modules\Students\Entities\Student;
use Modules\Nurse\Entities\Nurse;
use Session;

class AddNurseRecord extends ModalComponent
{
    public $student_id;
    public $class_id;
    public $sickness;
    public $prescription;
    public $medicine;
    public $comment;

    //validate portifolio
    protected $rules = [
        'student_id'   => 'required',
        'class_id'     =>'required',
        'sickness'     => 'required',
        'prescription' => 'required',
        'medicine'     => 'required',
        'comment'      => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'student_id.required' => 'Student Name is required',
        'class_id.required' => 'Class is required',
        'sickness.required' => 'Sickness is required',
        'prescription.required' => 'Prescription is required',
        'medicine.required' => 'Medicine is required',
        'comment.required' => 'Comment is required',
    ];

    public function render()
    {
        return view('livewire.add-nurse-record',[
            'students'=>Student::get(),
            'classes' =>Classes::get()
        ]);
    }
    /**
     * This function creates Nurse Records
     */
    public function submit()
    {
        $this->validate();
        $this->emit('NurseRecords', 'refreshComponent');
        Nurse::addNurse($this->student_id,$this->class_id,$this->sickness,$this->prescription,$this->medicine,$this->comment);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Operation is successful');
    }
}
