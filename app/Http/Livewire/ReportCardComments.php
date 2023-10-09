<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ReportCard\Entities\Result;
use Modules\ReportCard\Entities\ReportCardComment;
use DB;
use Session;

class ReportCardComments extends Component
{
    
    public $student_id;
    public $term;
    public $headteachers_comment;

    public function render()
    {
        return view('livewire.report-card-comments',[
            'comments' => Result::getTermlyClassStudentComment($this->student_id, $this->term)
        ]);
    }
    /**
     * This function creates headteachers coment for the particular pupil
     */
    public function addHeadteachersComment()
{
    $this->validate([
        'headteachers_comment' => 'required',
    ]);

    ReportCardComment::commentPupilsResults($this->student_id, $this->headteachers_comment); // Make sure this method sets pupils_id internally
    Session::flash('msg', 'Teachers Comment Added successfully');
}
}
