<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use Modules\Class\Entities\Classes;
use Modules\Subject\Entities\Subject;
use Modules\Students\Entities\Student;
use Modules\ReportCard\Entities\Result;
use Session;

class AddResult extends ModalComponent
{
        public $student_id;
        public $class_id;
        public $subject_id;
        public $term;
        public $assessment_marks;
        public $examination_marks;
        public $grade;
        public $teacher_initials;
        public $remark;
        
         //validate category
    protected $rules = [
        'class_id'          => 'required',
        'student_id'          => 'required',
        'subject_id'        => 'required',
        'term'              => 'required',
        'assessment_marks'  => '',
        'examination_marks' => '',
        'grade'             => '',
        'teacher_initials'  => '',
        'remark'            => '',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'class_id.required'      => 'Class is required',
        'subject_id.required'    => 'Subject is required',
        'term.required' => 'Term is required',
    ];
    public function render()
    {
        return view('livewire.add-result',[
            'subjects'=>Subject::get(),
            'classes' =>Classes::get(),
            'students'=>Student::get()
        ]);
    }
    /**
     * This function creates results
     */
    public function submit()
    {
        $this->validate();
        $this->emit('Examinations', 'refreshComponent');
        Result::addResult($this->student_id,$this->class_id,$this->subject_id,$this->term,$this->assessment_marks,$this->examination_marks,$this->grade,$this->teacher_initials,$this->remark);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Operation is successful');
    }
}
