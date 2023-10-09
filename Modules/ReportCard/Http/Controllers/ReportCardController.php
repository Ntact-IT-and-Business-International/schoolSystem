<?php

namespace Modules\ReportCard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ReportCard\Entities\Result;
use Modules\ReportCard\Entities\ReportCardComment;
use Carbon\Carbon;
use DB;
use Modules\TermDuration\Entities\TermsDuration;

class ReportCardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('reportcard::index');
    }
    
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function holidayPackage()
    {
        return view('reportcard::holiday_package');
    } 
    public function pleResuts()
    {
        return view('reportcard::ple_results');
    } 
    //This function gets examinations
    public function examinations()
    {
        return view('reportcard::examinations');
    } 
     //This function gets page that displays terms for primary section
    public function generateReportCards()
    {
        return view('reportcard::records_per_terms');
    }
    /**
     * This function gets the page for all terms for nursery section 
     */
    public function generateNurseryReportCards(){
        return view('reportcard::nursery_records_per_terms');
    }
    //This function gets page that displays classes for the term
    public function termlyClasses($term_id)
    {
        return view('reportcard::records_per_class',compact('term_id'));
    }
    /**
     * This function gets nursery classes classes for that term 
     */
    public function viewNurseryTermlyClasses($term_id){
        return view('reportcard::nursery_classes_per_term',compact('term_id'));
    }
    //This function gets page that displays pupils in a particular class
    public function classStudents($class_id,$term)
    {
        return view('reportcard::pupils_in_class',compact('class_id','term'));
    }
    /**
     * This function gets nursery classes students
     */
    public function nurseryClassStudents($class_id,$term){
        return view('reportcard::nursery_pupils_in_class',compact('class_id','term'));
    }
    //This function gets page that displays pupils report card
    public function studentReportCard($student_id,$term)
    {
        return view('reportcard::report_card',compact('student_id','term'));
    }
    /**
     * This function gets midterm results for particular child
     */
    public function studentMidtremResults($student_id,$term){
        return view('reportcard::mid_term_results',compact('student_id','term'));
    }
    //This function gets page that displays print pupils report card
    public function printStudentReportCard($student_id,$term)
    {
        $student_report_cards=Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->where('student_id',$student_id)
        ->where('results.term',$term)
        ->whereYear('results.created_at', '=', Carbon::today())
        //->limit(1)
        ->distinct('students.last_name')
        ->get(['students.last_name','students.first_name','students.other_names','results.student_id','classes.level','results.term',
                            'students.date_of_birth','students.gender','subjects.subject','results.*']);
        $student_report_details=$this->getStudentDetails($student_id,$term);

        return view('reportcard::print_reportcard_now',compact('student_report_cards','student_report_details'));
    }
    //This function gets page that displays print pupils report card
    public function printNurseryReportCard($student_id,$term)
    {
        $student_report_cards=Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->where('student_id',$student_id)
        ->where('results.term',$term)
        ->whereYear('results.created_at', '=', Carbon::today())
        //->limit(1)
        ->distinct('students.last_name')
        ->get(['students.last_name','students.first_name','students.other_names','results.student_id','classes.level',
                            'students.date_of_birth','students.gender','students.fees_pay_code','subjects.subject','results.*']);
        $student_report_details=$this->getStudentDetails($student_id,$term);

        return view('reportcard::print_nursery_reportcard_now',compact('student_report_cards','student_report_details'));
    }
    private function getStudentDetails($student_id,$term){
        return Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->where('student_id',$student_id)
        ->where('results.term',$term)
        ->whereYear('results.created_at', '=', Carbon::today())
        ->limit(1)
        ->distinct('students.last_name')
        ->get(['students.last_name','students.first_name','students.other_names','results.student_id','classes.level','results.term',
                            'students.date_of_birth','students.gender','students.fees_pay_code','subjects.subject','results.*','students.photo']);
    }
    /**
     * This function prints all the midterm results only
     */
    public function printStudentMidtermResults($student_id,$term){
        $student_report_cards=Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->where('student_id',$student_id)
        ->where('results.term',$term)
        ->whereYear('results.created_at', '=', Carbon::today())
        //->limit(1)
        ->distinct('students.last_name')
        ->get(['students.last_name','students.first_name','students.other_names','results.student_id','classes.level','results.term',
                            'students.date_of_birth','students.gender','subjects.subject','results.*']);

        $student_report_details=$this->getStudentDetails($student_id,$term);

        return view('reportcard::print_midterm_results_now',compact('student_report_cards','student_report_details'));
    }
    /**  
     * This function prints nursery midterm results
     */
    public function printNurseryMidtermResults($student_id,$term){
        $student_report_cards=Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->where('student_id',$student_id)
        ->where('results.term',$term)
        ->whereYear('results.created_at', '=', Carbon::today())
        ->distinct('students.last_name')
        ->get(['students.last_name','students.first_name','students.other_names','results.student_id','classes.level',
                            'students.date_of_birth','students.gender','subjects.subject','results.*']);

        $student_report_details=$this->getStudentDetails($student_id,$term);

        return view('reportcard::print_nursery_midterm_results',compact('student_report_cards','student_report_details','student_id'));
    }
    /**
     * This function gets primary marksheet
     */
    public function generatePrimaryMarksheet($class_id,$term){
        return view('reportcard::primary_marksheet',compact('class_id','term'));
    } 
    /**
     * This function print primary mark sheet
     */
    public function printPrimaryMarksheet($class_id,$term){
        $student_report_details =Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->where('results.class_id',$class_id)
        ->where('results.term',$term)
        ->whereYear('results.created_at', '=', Carbon::today())
        ->distinct('students.last_name')
        ->get(['students.last_name','students.first_name','students.other_names','results.student_id','results.term']);
        return view('reportcard::print_primary_marksheet',compact('student_report_details'));
    }
    /**
     * This function gets midterm primary marksheet
     */
    public function generateMidtermPrimaryMarksheet($class_id,$term){ 
        return view('reportcard::midterm_primary_marksheet',compact('class_id','term'));
    } 
    /**
     * This function print primary midterm mark sheet 
     */
    public function printMidermPrimaryMarksheet($class_id,$term){
        $student_report_details =Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->where('results.class_id',$class_id)
        ->where('results.term',$term)
        ->whereYear('results.created_at', '=', Carbon::today())
        ->distinct('students.last_name')
        ->get(['students.last_name','students.first_name','students.other_names','results.student_id','results.term']);
        return view('reportcard::print_midterm_primary_marksheet_now',compact('student_report_details'));
    }
    /**
     * This function gets midterm nursery marksheet
     */
    public function nurseryMidermMarksheet($class_id,$term){ 
        return view('reportcard::midterm_nursery_marksheet',compact('class_id','term'));
    }
    /**
     * This function gets exam nursery marksheet
     */
    public function nurseryExamMarksheet($class_id,$term){ 
        return view('reportcard::exam_nursery_marksheet',compact('class_id','term'));
    }
    /**
     * This function gets nursery midterm printing
     */
    public function printNurseryMidtermMarksheet($class_id,$term){
        $student_report_details =Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->where('results.class_id',$class_id)
        ->where('results.term',$term)
        ->whereYear('results.created_at', '=', Carbon::today())
        ->distinct('students.last_name')
        ->get(['students.last_name','students.first_name','students.other_names','results.student_id','results.term']);
        return view('reportcard::print_nursery_midterm_marksheet_now',compact('student_report_details'));
    }
    /**
     * This function gets nursery midterm printing
     */
    public function printNurseryExamMarksheet($class_id,$term){
        $student_report_details =Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->where('results.class_id',$class_id)
        ->where('results.term',$term)
        ->whereYear('results.created_at', '=', Carbon::today())
        ->distinct('students.last_name')
        ->get(['students.last_name','students.first_name','students.other_names','results.student_id','results.term']);
        return view('reportcard::print_nursery_exam_marksheet_now',compact('student_report_details'));
    } 
    /**
     * This function edits results
     */
    public function editResults($result_id){
        return view('reportcard::edit_results',compact('result_id'));
    }
    /**
     * This function edits ple results
     */
    public function editPleResults($ple_result_id){
        return view('reportcard::edit_ple_results',compact('ple_result_id'));
    }
    /**
     * This function get page for commenting on the report card
     */
    public function commentOnReportCard($student_id,$term){
        $student_name = Result::join('students','students.id','results.student_id')->where('term',$term)->where('students.id',$student_id)->select(DB::raw('CONCAT(students.last_name, " ", students.first_name) as full_name'))->value('full_name');
        $term = Result::join('students','students.id','results.student_id')->where('term',$term)->where('students.id',$student_id)->value('term');
        $teachers_comment=$this->getTeachersComment($student_id,$term);
        $start_date =$this->getStartOfTerm($term);
        $class_teeachers_name =$this->getsClassteachesrName($student_id,$term);
        return view('reportcard::comment_on_report_card',compact('student_id','term','student_name','term','teachers_comment','start_date','class_teeachers_name'));
    }
    
    public function saveComment()
    {
        // Validate the request data here
        $comment = new ReportCardComment;
        $comment->pupils_id    =request()->pupils_id;
        $comment->position  =request()->position;
        $comment->term  =request()->term;
        $comment->teachers_comment  =request()->teachers_comment;
        $comment->next_term_begins  =request()->next_term_begins;
        $comment->teachers_id       = auth()->user()->id;
        $comment->save();

        return Redirect()->back()->with('msg','Comment Added Successfully');
    }
    /**
     * This function gets comment for the teachers comment for the headteacher to see before commenting his
     */
    public function getTeachersComment($student_id,$term){
      return ReportCardComment::where('term',$term)->wherePupilsId($student_id)->value('teachers_comment');
    }
    /**
     * This function adds Headteachers comment to the pupils results
     */
    public function commentOnPupilsResults($student_id){
        ReportCardComment::wherePupilsId($student_id)->update([
            'headteachers_comment' => request()->headteachers_comment,
            'headteachers_id' => auth()->user()->id,
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
        return ReportCardComment::join('users','users.id','report_card_comments.teachers_id')->where('report_card_comments.term',$term)->value('users.name');
    }
}
