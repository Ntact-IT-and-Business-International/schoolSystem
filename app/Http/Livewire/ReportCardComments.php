<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ReportCard\Entities\Result;
use Modules\ReportCard\Entities\ReportCardComment;
use DB;
use Session;

class ReportCardComments extends Component
{
    public $comments;
    public $student_id;
    public $position;
    public $next_term_begins;
    public $teachers_comment;
    public $term;
    public $headteachers_comment;

    //validate category
    protected $rules = [
        'student_id'         => '',
        'position'           => 'required',
        'next_term_begins'   => 'required',
        'teachers_comment'   => 'required',
        'term'               => 'required',
        'headteachers_comment' =>'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'position.required' => 'Position paid is required',
        'next_term_begins.required' => 'The begining of next term is required',
        'teachers_comment.required' => 'Teachers comment is required',
        'term.required' => 'Term is required',
        'headteachers_comment.required' => 'Headteacher comment is required',
    ];

    public function render()
    {
        return view('livewire.report-card-comments');
    }
    public function mount($term,$student_id){
        $this->comments = Result::getTermlyClassStudentComment($student_id, $term);
        $this->fill([
            'student_id'      => Result::join('students','students.id','results.student_id')->where('students.id',$this->student_id)->select(DB::raw('CONCAT(students.last_name, " ", students.first_name) as full_name'))
            ->value('full_name'),
        ]);
    }
    /**
     * This function creates class teachers comment
     */
    public function submitClassTeacherComment()
    {
        $this->validate();
        Faq::ReportCardComment($this->student_id,$this->position,$this->next_term_begins,$this->teachers_comment,$this->term);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        Session::flash('msg', 'Comment is successful Added');
    }
    /**
     * This function creates headteachers coment for the particular pupil
     */
    public function addHeadteachersComment(){
        $this->validate();
        ReportCardComment::commentPupilsResults($this->student_id,$this->headteachers_comment);
    }
}
