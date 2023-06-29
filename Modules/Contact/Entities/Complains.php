<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complains extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\class_id\Database\factories\ComplainsFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('complain', 'like', '%'.$val.'%')
        ->orWhere('classes.level', 'like', '%'.$val.'%')
        ->orWhere('students.last_name','like','%'.$val.'%')
        ->orWhere('reply','like','%'.$val.'%')
        ->orWhere('users.name','like','%'.$val.'%');
    }
    /**
     * This function creates the complain
     */
    public static function addComplain($student_id,$class_id,$complain){
        Complains::create([
            'student_id'      =>$student_id,
            'class_id'     => $class_id,
            'complain'    => $complain,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets Complain
     */
    public static function getComplain($search, $sortBy, $sortDirection, $perPage)
    {
        return Complains::join('users','users.id','complains.reply_id')
        ->join('students','students.id','complains.student_id')
        ->join('classes','classes.id','complains.class_id')->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage,['complains.complain','complains.id','complains.reply','students.last_name','students.first_name','students.other_names','classes.level','users.name']);
    }
    /**
     * This function gets form for editing complain information
     */
    public static function editComplain($complain_id)
    {
        return Complains::whereId($complain_id)->get();
    }

    /**
     * This function updates the edited complain details
     */
    public static function updateComplain($complain_id,$student_id,$class_id,$complain)
    {
        Complains::whereId($complain_id)->update([
            'student_id'      => $student_id,
            'class_id'      => $class_id,
            'complain'    => $complain,
            'user_id'    =>auth()->user()->id,
        ]);
    }
    /**
     * This function replies complain details
     */
    public static function replyComplains($complain_id,$reply)
    {
        Complains::whereId($complain_id)->update([
            'reply'    => $reply,
            'reply_id'    =>auth()->user()->id,
        ]);
    }
}
