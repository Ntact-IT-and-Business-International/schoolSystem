<?php

namespace Modules\Students\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('students::index');
    } 

    /**
     * This function gets students by year
     */
    public function studentsYear(){
        return view('students::students_by_year');
    }
    /**
     * This function gets daily students Attendance
     */
    public function dailyAttendance(){
        return view('students::daily_attendance');
    }
    /**
     * This function gets the permissions for the students
     */
    public function studentsPermission(){
        return view('students::pupils_permission');
    }
    /**
     * This function gets the students for the particular class
     */
    public function studentsForParticularClass($class_id){
        return view('students::students_by_class',compact('class_id'));
    }
    /**
     * This function gets the students for the particular year class
     */
    public function studentsForParticularYearClass($year_id){
        return view('students::classes_per_year',compact('year_id'));
    }
    /**
     * This function gets the students for the particular year class
     */
    public function studentsPerYearPerClass($class_id){
        return view('students::students_classes_per_year',compact('class_id'));
    }
    /**
     * This function gets form for updating students information
     */
    public function editStudent($student_id){
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('students::edit_student',compact('student_id'));
    }
    /**
     * This function gets more students information
     */
    public function studentsMoreInformation($student_id){
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('students::students_more_details',compact('student_id'));
    }
    /**
     * This function gets form to update students photo
     */
    public function uploadStudentsPhoto($student_id){
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('students::upload_students_photo',compact('student_id'));
    }
    /**
     * This funtion gets edit daily attendace form
     */
    public function editDailyAttendance($attendance_id){
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('students::edit_daily_attendance',compact('attendance_id'));
    }
}
