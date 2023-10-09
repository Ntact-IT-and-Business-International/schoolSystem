<?php

namespace Modules\ReportCard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ReportCard\Entities\Result;
use Modules\ReportCard\Entities\MidtermComment;
use Carbon\Carbon;
use DB;
use Modules\TermDuration\Entities\TermsDuration;

class MidtermController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function commentOnMidtermResults($student_id,$term)
    {
        $student_name = Result::join('students','students.id','results.student_id')->where('term',$term)->where('students.id',$student_id)->select(DB::raw('CONCAT(students.last_name, " ", students.first_name) as full_name'))->value('full_name');
        $terms = Result::join('students','students.id','results.student_id')->where('term',$term)->where('students.id',$student_id)->value('term');
        $teacher_comment=$this->getTeachersComment($student_id,$term);
        $start_date =$this->getStartOfTerm($term);
        $class_teeachers_name =$this->getsClassteachesrName($student_id,$term);
        return view('reportcard::comment_on_midterm_results',compact('student_id','term','student_name','terms','teacher_comment','start_date','class_teeachers_name'));
    }
    public function createMidtermComment()
    {
        // Validate the request data here
        $comment = new MidtermComment;
        $comment->student_id    =request()->student_id;
        $comment->class_position  =request()->class_position;
        $comment->term  =request()->term;
        $comment->teacher_comment  =request()->teacher_comment;
        $comment->teacher_id       = auth()->user()->id;
        $comment->save();

        return Redirect()->back()->with('msg','Comment Added Successfully');
    }
    /**
     * This function gets comment for the teachers comment for the headteacher to see before commenting his
     */
    public function getTeachersComment($student_id,$term){
      return MidtermComment::where('term',$term)->whereStudentId($student_id)->value('teacher_comment');
    }
    /**
     * This function adds Headteachers comment to the pupils results
     */
    public function commentMidtermResults($student_id){
        MidtermComment::whereStudentId($student_id)->update([
            'headteacher_comment' => request()->headteacher_comment,
            'headteacher_id' => auth()->user()->id,
        ]);
        return Redirect()->back()->with('msg','Comment Added Successfully');
    }
    /**
     * This function gets the beginning of next term
     */
    private function getStartOfTerm($term){
        return TermsDuration::where('term',$term)->value('start_date');
    }
    /**
     * This function get class teachers name 
     */
    public function getsClassteachesrName($student_id,$term){
        return MidtermComment::join('users','users.id','midterm_comments.teacher_id')->where('midterm_comments.term',$term)->where('midterm_comments.student_id',$student_id)->value('users.name');
    }
}
