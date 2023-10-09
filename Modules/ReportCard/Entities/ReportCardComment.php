<?php

namespace Modules\ReportCard\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportCardComment extends Model
{
    use HasFactory;

    protected $fillable = ['pupils_id','position','term','teachers_comment','next_term_begins','teachers_id','headteachers_comment','headteachers_id'];
    
    protected static function newFactory()
    {
        return \Modules\ReportCard\Database\factories\ReportCardCommentFactory::new();
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
}
