<?php

namespace Modules\ReportCard\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Result extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\ReportCard\Database\factories\ResultFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('students.first_name', 'like', '%'.$val.'%')
        ->orwhere('students.last_name', 'like', '%'.$val.'%')
        ->orWhere('classes.level', 'like', '%'.$val.'%')
        ->orWhere('subjects.subject','like','%'.$val.'%')
        ->orWhere('term','like','%'.$val.'%')
        ->orWhere('assessment_marks','like','%'.$val.'%')
        ->orWhere('assessment_grade','like','%'.$val.'%')
        ->orWhere('examination_marks','like','%'.$val.'%')
        ->orWhere('teacher_initials','like','%'.$val.'%')
        ->orWhere('remark','like','%'.$val.'%')
        ->orWhere('results.created_at','like','%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the Result
     */
    public static function addResult($student_id,$class_id,$subject_id,$term,$assessment_marks,$assessment_grade,$examination_marks,$grade,$teacher_initials,$remark){
        
       // Check if the student is registered in a different class for the current year
        if (Result::where('student_id', request()->student_id)
        ->where('class_id', '!=', request()->class_id)
        ->whereYear('created_at', Carbon::now()->year)
        ->exists()) {

        return redirect()->back()->withInput()->withErrors('The student belongs to another class.');

        } else {
        // Assuming you have the necessary variables declared here
        // $student_id = request()->student_id;
        // $class_id = request()->class_id;
        // $subject_id = request()->subject_id;
        // $term = request()->term;
        // $assessment_marks = request()->assessment_marks;
        // $assessment_grade = request()->assessment_grade;
        // $examination_marks = request()->examination_marks;
        // $grade = request()->grade;
        // $teacher_initials = request()->teacher_initials;
        // $remark = request()->remark;

        // Create a new Result record
        Result::create([
            'student_id' => $student_id,
            'class_id' => $class_id,
            'subject_id' => $subject_id,
            'term' => $term,
            'assessment_marks' => $assessment_marks,
            'assessment_grade' => $assessment_grade,
            'examination_marks' => $examination_marks,
            'grade' => $grade,
            'teacher_initials' => $teacher_initials,
            'remark' => $remark,
            'user_id' => auth()->user()->id,
        ]);
    }
    }
    /**
     * this function gets Result
     */
    public static function getResult($search, $sortBy, $sortDirection, $perPage)
    {
        return Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['results.*','users.name','students.last_name','students.first_name','students.other_names','classes.level','subjects.subject']);
    }
    /**
     * This function gets termly Results for the current Year
     */
    public static function getTermlyResult($search, $sortBy, $sortDirection, $perPage)
    {
        return Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->whereYear('results.created_at', '=', Carbon::today())
        ->distinct('results.term')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage,['results.term']);
    } 
    /**
     * This function gets termly results for nursery school
     */
    public static function getNurseryTermlyResult($search, $sortBy, $sortDirection, $perPage)
    {
        return Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->whereYear('results.created_at', '=', Carbon::today())
        ->distinct('results.term')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage,['results.term']);
    }
    /**
     * This function gets termly Classes for the current Year
     */
    public static function getTermlyClasses($term_id,$search, $sortBy, $sortDirection, $perPage)
    {
        return Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->whereIn('results.class_id',[4,5,6,7,8,9,10])
        ->whereTerm($term_id)
        ->whereYear('results.created_at', '=', Carbon::today())
        ->distinct('results.class_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage,['classes.level','results.class_id','results.term']);
    }
    /**
     * This function gets termly Classes for nursery the current Year
     */
    public static function getNurseryTermlyClasses($term_id,$search, $sortBy, $sortDirection, $perPage)
    {
        return Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->whereIn('results.class_id',[1,2,3])
        ->whereTerm($term_id)
        ->whereYear('results.created_at', '=', Carbon::today())
        ->distinct('results.class_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage,['classes.level','results.class_id','results.term']);
    }
    /**
     * This function gets Class Students for the current Year
     */
    public static function getTermlyClassStudent($student_id,$term,$search, $sortBy, $sortDirection, $perPage)
    {
        return Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->where('student_id',$student_id)
        ->where('results.term',$term)
        ->whereYear('results.created_at', '=', Carbon::today())
        //->limit(1)
        ->distinct('students.last_name')
        ->get(['students.last_name','students.first_name','students.other_names','results.student_id','classes.level',
                            'students.date_of_birth','students.gender','subjects.subject','results.*']);
    }
    /**
     * This function gets Class Students for the current Year
     */
    public static function getClassStudent($class_id,$term,$search, $sortBy, $sortDirection, $perPage)
    {
        return Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->where('results.class_id',$class_id)
        ->where('results.term',$term)
        ->whereYear('results.created_at', '=', Carbon::today())
        ->distinct('students.last_name')
        ->paginate($perPage,['students.last_name','students.first_name','students.other_names','results.student_id','results.term','results.class_id']);
    }
    /**
     * This function gets form for editing Result information
     */
    public static function editResult($result_id)
    {
        return Result::whereId($result_id)->get();
    }

    /**
     * This function updates the edited Result deails
     */
    public static function updateResultInfo($result_id,$class_id,$subject_id,$term,$assessment_marks,$assessment_grade,$examination_marks,$grade,$teacher_initials,$remark)
    {
        Result::whereId($result_id)->update([
            'class_id'         => $class_id,
            'subject_id'       => $subject_id,
            'term'             =>$term,
            'assessment_marks' => $assessment_marks,
            'assessment_grade' =>$assessment_grade,
            'examination_marks'=>$examination_marks,
            'grade'            =>$grade,
            'teacher_initials' =>$teacher_initials,
            'remark'           => $remark,
            'user_id'          =>auth()->user()->id,
        ]);
    }
     /**
     * This function gets Class Students for the current Year
     */
    public static function getTermlyClassStudentComment($student_id,$term)
    {
        return Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->where('student_id',$student_id)
        ->where('results.term',$term)
        ->whereYear('results.created_at', '=', Carbon::today())
        ->distinct('students.last_name')
        ->get(['students.last_name','students.first_name','students.other_names','results.student_id',
                            'students.date_of_birth','students.gender','subjects.subject','results.*']);
    }
}
