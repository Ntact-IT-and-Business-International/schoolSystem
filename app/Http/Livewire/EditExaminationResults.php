<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ReportCard\Entities\Result;
use Session;
use Modules\Class\Entities\Classes;
use Modules\Subject\Entities\Subject;
use DB;

class EditExaminationResults extends Component
{
    public $result_id;
    public $student_id;
    public $subject_id;
    public $term;
    public $assessment_marks;
    public $assessment_grade;
    public $examination_marks;
    public $grade;
    public $teacher_initials;
    public $remark;
    public $class_id;
    
    protected $rules = [
        'term'             => 'required',
        'class_id'         => '',
        'subject_id'       => '',
        'assessment_marks' => 'required',
        'assessment_grade' => 'required',
        'examination_marks'=> 'required',
        'grade'            => 'required',
        'teacher_initials' => 'required',
        'remark'           => 'required',
    ];

    public function render()
    {
        return view('livewire.edit-examination-results',[
            'results' =>Result::editResult($this->result_id),
            'classes'=>Classes::get(),
            'subjects'=>Subject::get()
        ]);
    }
    /**
     * This function displays data to be edited
     */
    public function mount($result_id)
    {
        $this->fill([
            'class_id'   => Result::editResult($this->result_id)->value('class_id'),
            'student_id'      => Result::join('students','students.id','results.student_id')->where('results.id',$this->result_id)->select(DB::raw('CONCAT(students.last_name, " ", students.first_name) as full_name'))
            ->value('full_name'),
            'subject_id' => Result::editResult($this->result_id)->value('subject_id'),
            'term' => Result::editResult($this->result_id)->value('term'),
            'assessment_marks' => Result::editResult($this->result_id)->value('assessment_marks'),
            'assessment_grade' => Result::editResult($this->result_id)->value('assessment_grade'),
            'examination_marks' => Result::editResult($this->result_id)->value('examination_marks'),
            'grade' => Result::editResult($this->result_id)->value('grade'),
            'teacher_initials' => Result::editResult($this->result_id)->value('teacher_initials'),
            'remark' => Result::editResult($this->result_id)->value('remark'),
        ]);
    }

    /**
     * This function updates result
     */
    public function updateResult()
    {
        $this->validate();
        Result::updateResultInfo($this->result_id,$this->class_id,$this->subject_id,$this->term,$this->assessment_marks,$this->assessment_grade,$this->examination_marks,$this->grade,$this->teacher_initials,$this->remark);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to('/reportcard/examinations')->with('msg', 'Student Results info has been edited successfully');
    }
}
