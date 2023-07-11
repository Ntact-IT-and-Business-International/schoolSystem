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
        public $assessment_grade;
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
        'assessment_grade'  =>'',
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
            'baby_students'=>Student::whereClassId(1)->get(),
            'middle_students'=>Student::whereClassId(2)->get(),
            'top_students'=>Student::whereClassId(3)->get(),
            'p1_students'=>Student::whereClassId(4)->get(),
            'p2_students'=>Student::whereClassId(5)->get(),
            'p3_students'=>Student::whereClassId(6)->get(),
            'p4_students'=>Student::whereClassId(7)->get(),
            'p5_students'=>Student::whereClassId(8)->get(),
            'p6_students'=>Student::whereClassId(9)->get(),
            'p7_students'=>Student::whereClassId(10)->get()
        ]);
    }
    /**
     * This function creates results
     */
    public function submit()
    {
        $this->validate();
        $this->emit('Examinations', 'refreshComponent');
        Result::addResult($this->student_id,$this->class_id,$this->subject_id,$this->term,$this->assessment_marks,$this->assessment_grade,$this->examination_marks,$this->grade,$this->teacher_initials,$this->remark);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        // Session::flash('msg', 'Operation is successful');
        return redirect()->back()->with('msg', 'Operation is successful');
    }
}
