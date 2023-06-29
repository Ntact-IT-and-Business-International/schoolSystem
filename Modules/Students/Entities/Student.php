<?php

namespace Modules\Students\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Students\Database\factories\StudentFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->Where('first_name', 'like', '%'.$val.'%')
        ->orWhere('last_name', 'like', '%'.$val.'%')
        ->orWhere('other_names', 'like', '%'.$val.'%')
        ->orWhere('classes.level', 'like', '%'.$val.'%')
        ->orWhere('date_of_birth', 'like', '%'.$val.'%')
        ->orWhere('gender', 'like', '%'.$val.'%')
        ->orWhere('special_need', 'like', '%'.$val.'%')
        ->orWhere('parents_name', 'like', '%'.$val.'%')
        ->orWhere('contact', 'like', '%'.$val.'%')
        ->orWhere('nin', 'like', '%'.$val.'%')
        ->orWhere('location', 'like', '%'.$val.'%')
        ->orWhere('section', 'like', '%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the student
     */
    public static function addStudent($first_name,$last_name,$other_names,$class_id,$date_of_birth,$gender,$special_need,$parents_name,$contact,$nin,$location,$section,$photo){
        Student::create([
            'first_name'    =>$first_name,
            'last_name'     =>$last_name,
            'other_names'   =>$other_names,
            'class_id'      =>$class_id,
            'date_of_birth' =>$date_of_birth,
            'gender'        =>$gender,
            'special_need'  =>$special_need,
            'parents_name'  =>$parents_name,
            'contact'       =>$contact,
            'nin'           =>$nin,
            'location'      =>$location,
            'section'       =>$section,
            'photo'         =>$photo,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets all students  
     */
    public static function getStudents($class_id,$search, $sortBy, $sortDirection, $perPage)
    {
        return Student::join('users', 'users.id', 'students.user_id')
        ->join('classes', 'classes.id', 'students.class_id')
        ->whereYear('students.created_at', '=', Carbon::today())
        ->where('students.class_id',$class_id)
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['students.*','users.name','classes.level']);
    }
    /**
     * This function gets form for editing students information
     */
    public static function editStudent($student_id)
    {
        return Student::whereId($student_id)->get();
    }

    /**
     * This function updates the edited student
     */
    public static function updateStudentInfo($student_id,$first_name,$last_name,$other_names,$class_id,$date_of_birth,$gender,$special_need,$parents_name,$contact,$nin,$location,$section)
    {
        Student::whereId($student_id)->update([
            'first_name'    => $first_name,
            'last_name'     => $last_name,
            'other_names'   => $other_names,
            'class_id'      => $class_id,
            'date_of_birth' => $date_of_birth,
            'gender'        => $gender,
            'special_need'  => $special_need,
            'parents_name'  => $parents_name,
            'contact'       => $contact,
            'nin'           => $nin,
            'location'      => $location,
            'section'       => $section,
            'user_id'       =>auth()->user()->id,
        ]);
    } 
    /**
     * This function gets Class Students for the current Year
     */
    public static function getClassStudent($search, $sortBy, $sortDirection, $perPage)
    {
        return Student::join('users', 'users.id', 'students.user_id')
        ->join('classes', 'classes.id', 'students.class_id')
        ->whereYear('students.created_at', '=', Carbon::today())
        ->distinct('classes.level')
        ->paginate($perPage, ['students.*','classes.level']);
    }
    /**
     * This function gets Class Students for the current Year
     */
    public static function getStudentsByYear($search, $sortBy, $sortDirection, $perPage)
    {
        return Student::join('users', 'users.id', 'students.user_id')
        ->join('classes', 'classes.id', 'students.class_id')
        ->distinct('students.created_at')
        ->paginate($perPage, ['students.*']);
    }
    /**
     * This function gets classes and students for a particular year
     */
    public static function getClassesForYear($year_id,$search, $sortBy, $sortDirection, $perPage){
        return Student::join('users', 'users.id', 'students.user_id')
        ->join('classes', 'classes.id', 'students.class_id')
        ->whereYear('students.created_at',$year_id)
        ->distinct('classes.level')
        ->paginate($perPage, ['students.*','classes.level']);
    }
    /**
     * This function gets classes and students for a particular year
     */
    public static function getStudentsForClassesForYear($class_id,$search, $sortBy, $sortDirection, $perPage){
        return Student::join('users', 'users.id', 'students.user_id')
        ->join('classes', 'classes.id', 'students.class_id')
        ->whereClassId($class_id)
        ->paginate($perPage, ['students.*','classes.level']);
    }
}
