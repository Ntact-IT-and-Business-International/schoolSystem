<?php

namespace Modules\Staff\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staffs extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Staff\Database\factories\StaffsFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('staff_first_name', 'like', '%'.$val.'%')
        ->orWhere('staff_last_name', 'like', '%'.$val.'%')
        ->orWhere('staff_other_names', 'like', '%'.$val.'%')
        ->orWhere('date_of_birth', 'like', '%'.$val.'%')
        ->orWhere('gender', 'like', '%'.$val.'%')
        ->orWhere('phone_number', 'like', '%'.$val.'%')
        ->orWhere('staff_email', 'like', '%'.$val.'%')
        ->orWhere('nin', 'like', '%'.$val.'%')
        ->orWhere('qualification', 'like', '%'.$val.'%')
        ->orWhere('registration_number', 'like', '%'.$val.'%')
        ->orWhere('documents', 'like', '%'.$val.'%')
        ->orWhere('salary', 'like', '%'.$val.'%')
        ->orWhere('title', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the staffs
     */
    public static function addStaff($staff_first_name,$staff_last_name,$staff_other_names,$class_id,
        $date_of_birth,$gender,$phone_number,$staff_email,$nin,$location,$qualification,
        $subject_id,$registration_number,$title,$documents,$salary,$photo){
        Staffs::create([
            'staff_first_name'    =>$staff_first_name,
            'staff_last_name'     =>$staff_last_name,
            'staff_other_names'   =>$staff_other_names,
            'class_id'            =>$class_id,
            'date_of_birth'       =>$date_of_birth,
            'gender'              =>$gender,
            'phone_number'        =>$phone_number,
            'staff_email'         =>$staff_email,
            'nin'                 =>$nin,
            'qualification'       =>$qualification,
            'subject_id'          =>$subject_id,
            'registration_number' =>$registration_number,
            'title'               =>$title,
            'documents'           =>$documents,
            'salary'              =>$salary,
            'photo'               =>$photo,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets all staffs  
     */
    public static function getStaff($search, $sortBy, $sortDirection, $perPage)
    {
        return Staffs::join('users', 'users.id', 'staffs.user_id')
        ->join('classes', 'classes.id', 'staffs.class_id')
        ->join('subjects', 'subjects.id', 'staffs.subject_id')
        ->whereNotNull('staffs.class_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['staffs.*','users.name','classes.level','subjects.subject']);
    }
    /**
     * This function gets all the non teaching staff
     */
    public static function getNonTeachingStaff($search, $sortBy, $sortDirection, $perPage){
        return Staffs::where('staffs.class_id',Null)
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['staffs.*']);
    }
    /**
     * This function gets form for editing staffs information
     */
    public static function editStaff($staff_id)
    {
        return Staffs::whereId($staff_id)->get();
    }

    /**
     * This function updates the edited staffs
     */
    public static function updateStaffInfo($staff_id,$staff_first_name,$staff_last_name,$staff_other_names,
            $class_id,$date_of_birth,$gender,$phone_number,$staff_email,$nin,
            $qualification,$subject_id,$registration_number,$title,$salary)
    {
        Staffs::whereId($staff_id)->update([
            'staff_first_name'    => $staff_first_name,
            'staff_last_name'     => $staff_last_name,
            'staff_other_names'   => $staff_other_names,
            'class_id'            => $class_id,
            'date_of_birth'       => $date_of_birth,
            'gender'              => $gender,
            'phone_number'        => $phone_number,
            'staff_email'         => $staff_email,
            'nin'                 => $nin,
            'qualification'       => $qualification,
            'subject_id'          =>$subject_id,
            'registration_number' =>$registration_number,
            'title'               =>$title,
            'salary'              =>$salary,
            'user_id'             =>auth()->user()->id,
        ]);
    }
    /**
     * This function gets more staff information
     */
    public static function getStaffMoreInformation($staff_id){
        return Staffs::join('users', 'users.id', 'staffs.user_id')
        ->join('classes', 'classes.id', 'staffs.class_id')
        ->join('subjects', 'subjects.id', 'staffs.subject_id')
        ->where('staffs.id',$staff_id)
        ->get(['staffs.*','users.name','classes.level','subjects.subject']);
    }
}
