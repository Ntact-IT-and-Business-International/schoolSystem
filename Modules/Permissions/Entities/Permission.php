<?php

namespace Modules\Permissions\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Permissions\Database\factories\PermissionFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->Where('destination', 'like', '%'.$val.'%')
        ->orWhere('classes.level', 'like', '%'.$val.'%')
        ->orWhere('reason', 'like', '%'.$val.'%')
        ->orWhere('reply', 'like', '%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the Permissions
     * 
    */
    public static function requestForPermission($student_id,$staff_id,$class_id,$user_type,$destination,$reason){
        PermissionRequest::create([
            'student_id'  =>$student_id,
            'staff_id'    =>$staff_id,
            'class_id'    =>$class_id,
            'user_type'   =>$user_type,
            'destination' =>$destination,
            'reason'      =>$reason,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * This function get permissions for students  
     */
    public static function getPupilsPermissions($search, $sortBy, $sortDirection, $perPage)
    {
        return PermissionRequest::join('users', 'users.id', 'permission_requests.user_id')
        ->join('classes', 'classes.id', 'permission_requests.class_id')
        ->join('students', 'students.id', 'permission_requests.student_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['permission_requests.*','users.name','classes.level','students.last_name','students.first_name','students.other_names',
                            'students.contact']);
    }
    /**
     * this function get permissions for staff  
     */
    public static function allStaffPermissions($search, $sortBy, $sortDirection, $perPage)
    {
        return PermissionRequest::join('users', 'users.id', 'permission_requests.user_id')
        ->join('staffs', 'staffs.id', 'permission_requests.staff_id')
        ->join('classes', 'classes.id', 'permission_requests.class_id') 
        ->where('permission_requests.user_type', auth()->user()->user_type)
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['permission_requests.*','staffs.staff_first_name','staffs.staff_last_name','staffs.staff_other_names','users.name']);
    }
}
