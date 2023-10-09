<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ReportCard\Entities\Result;
use Modules\ReportCard\Entities\ReportCardComment;
use DB;
use Session;

class MidtermComments extends Component
{
    public $student_id;
    public $term;

    public function render()
    {
        return view('livewire.midterm-comments',[
            'comments' => Result::getTermlyClassStudentComment($this->student_id, $this->term)
        ]);
    }
     /**
     * This function creates headteachers coment for the particular pupil
     */
    public function addHeadteachersComment()
{
    $this->validate([
        'headteacher_comment' => 'required',
    ]);

    ReportCardComment::commentPupilsResults($this->student_id, $this->headteachers_comment); // Make sure this method sets pupils_id internally
    Session::flash('msg', 'Teachers Comment Added successfully');
}
}
