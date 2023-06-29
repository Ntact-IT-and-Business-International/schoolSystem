<?php

namespace Modules\Parents\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParentQuestions extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Parents\Database\factories\ParentQuestionsFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('complain', 'like', '%'.$val.'%')
        ->orWhere('students.last_name', 'like', '%'.$val.'%')
        ->orWhere('class.level', 'like', '%'.$val.'%')
        ->orWhere('feedback','like','%'.$val.'%')
        ->orWhere('feedback_id','like','%'.$val.'%')
        ->orWhere('users.name','like','%'.$val.'%');
    }
    /**
     * This function creates the Parent Issues
     */
    public static function addParentsComplains($class_id,$student_id,$complain,$feedback){
        ParentQuestions::create([
            'student_id'      =>$student_id,
            'class_id'        =>$class_id,
            'complain'        => $complain,
            'feedback'        => $feedback,
            'feedback_id'     => auth()->user()->id,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets Parents Complains
     */
    public static function getParentsComplains($search, $sortBy, $sortDirection, $perPage)
    {
        return ParentQuestions::search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage);
    }
    /**
     * This function gets form for editing Parents Complains information
     */
    public static function editParentsComplaint($parent_id)
    {
        return ParentQuestions::whereId($parent_id)->get();
    }

    /**
     * This function updates the edited Parents Issues details
     */
    public static function updateNurse($parent_id,$class_id,$student_id,$complain,$feedback)
    {
        ParentQuestions::whereId($parent_id)->update([
            'student_id'      =>$student_id,
            'class_id'        =>$class_id,
            'complain'        => $complain,
            'feedback'        => $feedback,
            'feedback_id'     => auth()->user()->id,
            'user_id'         =>auth()->user()->id,
        ]);
    }
}
