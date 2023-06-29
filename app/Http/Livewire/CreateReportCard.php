<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ReportCard\Entities\Result;
use Modules\Students\Entities\Student;
use Modules\Class\Entities\Classes;
use Modules\Subject\Entities\Subject;
use LivewireUI\Modal\ModalComponent;
use Session;

class CreateReportCard extends ModalComponent
{
    public $student_id;
    public $class_id;
    public $subject_id;
    public $term;
    public $examination_marks;
    public $assessment_marks;
    public $grade;
    public $teacher_initials;
    public $remark;

    //validate category
    protected $rules = [
        'student_id'       => 'required',
        'class_id'         => 'required',
        'subject_id'       => 'required',
        'term'             => 'required',
        'assessment_marks' => '',
        'examination_marks'=> '',
        'grade'            => 'required',
        'teacher_initials' => 'required',
        'remark'           => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'student_id.required'   => 'Student ID is required',
        'class_id.required'   => 'Cladd Id is required',
        'subject_id.required'   => 'SubjectID is required',
        'term.required'   => 'Term is required',
        'grade.required'   => 'grade of the remarks is required',
        'teacher_initials.required'  => 'teacher_initials Numberof Students is required',
        'remark.required' => 'Uploading remarks is required',
    ];
    public function render()
    {
        return view('livewire.create-report-card',[
            'students'=>Student::get(),
            'subjects' =>Subject::get(),
            'classes'  =>Classes::get()
        ]);
    }
    /**
     * This function creates Freport card
     */
    public function submit()
    {
        $this->validate();
        $this->emit('ReportCard', 'refreshComponent');
        Result::addremark($this->student_id,$this->class_id,$this->subject_id,$this->term,$this->assessment_marks,$this->examination_marks,$this->grade,$this->teacher_initials,$this->remark);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Report Card creation is successful');
    }
}
