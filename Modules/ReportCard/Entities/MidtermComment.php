<?php

namespace Modules\ReportCard\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MidtermComment extends Model
{
    use HasFactory;

    protected $fillable = ['student_id','class_position','term','teacher_comment','teacher_id','headteacher_comment','headteacher_id'];
    
    protected static function newFactory()
    {
        return \Modules\ReportCard\Database\factories\MidtermCommentFactory::new();
    }
}
