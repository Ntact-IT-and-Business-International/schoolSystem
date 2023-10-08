<?php

namespace Modules\ReportCard\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\ReportCard\Database\factories\CommentFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('students.first_name', 'like', '%'.$val.'%')
        ->orwhere('students.last_name', 'like', '%'.$val.'%')
        ->orWhere('term','like','%'.$val.'%')
        ->orWhere('comment','like','%'.$val.'%')
        ->orWhere('comments.created_at','like','%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
     /**
     * This function creates the Comment for the classteacher
     */
    public static function addPupilsComment($student_id,$position,$next_term_begins,$teachers_comment,$term){
       
        Comment::create([
             'student_id' => $student_id,
             'position'  =>$position,
             'term' => $term,
             'teachers_comment' => $teachers_comment,
             'next_term_begins' => $next_term_begins,
             'teachers_id' => auth()->user()->id,
         ]);
     }
      /**
     * This function creates the headteachers Comment
     */
    public static function commentPupilsResults($student_id,$headteachers_comment){
       
        Comment::whereId($student_id)->update([
             'headteachers_comment' => $headteachers_comment,
             'headteachers_id' => auth()->user()->id,
         ]);
     }
}
