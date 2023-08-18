<?php

namespace Modules\ReportCard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ReportCard\Entities\Result;
use Carbon\Carbon;

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
}
