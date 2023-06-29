<?php

namespace Modules\Nurse\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nurse extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Nurse\Database\factories\NurseFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('medicine', 'like', '%'.$val.'%')
        ->orWhere('students.last_name', 'like', '%'.$val.'%')
        ->orWhere('classes.level', 'like', '%'.$val.'%')
        ->orWhere('sickness','like','%'.$val.'%')
        ->orWhere('prescription','like','%'.$val.'%')
        ->orWhere('comment','like','%'.$val.'%');
    }
    /**
     * This function creates the Nurse
     */
    public static function addNurse($student_id,$class_id,$sickness,$prescription,$medicine,$comment){
        Nurse::create([
            'student_id'      => $student_id,
            'class_id'        =>$class_id,
            'sickness'        => $sickness,
            'prescription'    => $prescription,
            'medicine'        => $medicine,
            'comment'         => $comment,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets Nurse
     */
    public static function getNurse($search, $sortBy, $sortDirection, $perPage)
    {
        return Nurse::join('students','students.id','nurses.student_id')
        ->join('classes','classes.id','nurses.class_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage,['nurses.*','classes.level','students.last_name','students.first_name','students.other_names']);
    }
    /**
     * This function gets form for editing Nurse information
     */
    public static function editNurse($nurse_id)
    {
        return Nurse::whereId($nurse_id)->get();
    }

    /**
     * This function updates the edited Nurse details
     */
    public static function updateNurse($nurse_id,$sickness,$prescription,$medicine,$comment)
    {
        Nurse::whereId($nurse_id)->update([
            'sickness'        => $sickness,
            'prescription'    => $prescription,
            'medicine'        => $medicine,
            'comment'         => $comment,
            'user_id'    =>auth()->user()->id,
        ]);
    }
}
