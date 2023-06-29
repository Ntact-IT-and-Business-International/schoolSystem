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
     //This function gets page that displays terms
    public function generateReportCards()
    {
        return view('reportcard::records_per_terms');
    }
    //This function gets page that displays classes for the term
    public function termlyClasses()
    {
        return view('reportcard::records_per_class');
    }
    //This function gets page that displays pupils in a particular class
    public function classStudents()
    {
        return view('reportcard::pupils_in_class');
    }
    //This function gets page that displays pupils report card
    public function studentReportCard()
    {
        return view('reportcard::report_card');
    }
    //This function gets page that displays print pupils report card
    public function printStudentReportCard()
    {
        $student_report_cards=Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->whereYear('results.created_at', '=', Carbon::today())
        //->limit(1)
        ->distinct('students.last_name')
        ->get(['students.last_name','students.first_name','students.other_names','results.student_id','classes.level','results.term',
                            'students.date_of_birth','students.gender','subjects.subject','results.*']);
        $student_report_details=$this->getStudentDetails();

        return view('reportcard::print_reportcard_now',compact('student_report_cards','student_report_details'));
    }
    private function getStudentDetails(){
        return Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->whereYear('results.created_at', '=', Carbon::today())
        ->limit(1)
        ->distinct('students.last_name')
        ->get(['students.last_name','students.first_name','students.other_names','results.student_id','classes.level','results.term',
                            'students.date_of_birth','students.gender','subjects.subject','results.*']);
    }
}
