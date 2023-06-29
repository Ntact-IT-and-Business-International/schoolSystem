<?php

namespace Modules\Subject\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Subject\Database\factories\SubjectFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('subject', 'like', '%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the subjects
     */
    public static function addSubject($subject){
        Subject::create([
            'subject' =>$subject,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets all subjects  
     */
    public static function getSubjects($search, $sortBy, $sortDirection, $perPage)
    {
        return Subject::join('users', 'users.id', 'subjects.user_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['subjects.*','users.name']);
    }
    /**
     * This function gets form for editing subject information
     */
    public static function editSubject($subject_id)
    {
        return Subject::whereId($subject_id)->get();
    }

    /**
     * This function updates the edited subject
     */
    public static function updateSubject($subject_id,$subject)
    {
        Subject::whereId($subject_id)->update([
            'subject'    => $subject,
            'user_id'    =>auth()->user()->id,
        ]);
    }
}
