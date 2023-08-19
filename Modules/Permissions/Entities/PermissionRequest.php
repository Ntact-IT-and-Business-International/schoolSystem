<?php

namespace Modules\Permissions\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PermissionRequest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Permissions\Database\factories\PermissionRequestFactory::new();
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
        ->join('user_types','user_types.id','permission_requests.user_type')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['permission_requests.*','users.name','classes.level','students.last_name','students.first_name','students.other_names',
                            'students.contact','user_types.category']);
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
    /**
     * this function get permissions for staff  
     */
    public static function getMyPupilsPermissions($search, $sortBy, $sortDirection, $perPage)
    {
        return PermissionRequest::join('users', 'users.id', 'permission_requests.user_id')
        ->join('classes', 'classes.id', 'permission_requests.class_id')
        ->join('students', 'students.id', 'permission_requests.student_id')
        ->join('user_types', 'user_types.id', 'permission_requests.user_type')
        ->where('permission_requests.user_id',auth()->user()->id)
        ->where('permission_requests.staff_id',null)
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['permission_requests.*','users.name','classes.level','students.last_name','students.first_name','students.other_names',
        'students.contact','user_types.category']);
    }
    /**
     * this function get permissions for staff  
     */
    public static function getMyPermissions($search, $sortBy, $sortDirection, $perPage)
    {
        return PermissionRequest::join('users', 'users.id', 'permission_requests.reply_id')
        ->join('staffs', 'staffs.id', 'permission_requests.staff_id')
        ->join('user_types', 'user_types.id', 'permission_requests.user_type')
        ->join('classes', 'classes.id', 'permission_requests.class_id')
        ->where('permission_requests.user_id',auth()->user()->id)
        ->where('permission_requests.student_id',null)
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['permission_requests.*','users.name','user_types.category']);
    }
    /**
     * This function gets form for editing Permissions information
     */
    public static function editPermissions($permission_id)
    {
        return PermissionRequest::whereId($permission_id)->get();
    }

    /**
     * This function updates the edited Permissions Requests details
     */
    public static function updatePermissionRequestInfo($permission_id,$destination,$reason){
        PermissionRequest::whereId($permission_id)->update([
            'destination' =>$destination,
            'reason'      =>$reason,
            'user_id'       =>auth()->user()->id,
        ]);
    }
    /**
     * This function repliesthe staff permission requests
     */
    public static function replyPermissionRequest($permission_id,$reply){
        PermissionRequest::whereId($permission_id)->update([
            'reply'    =>$reply,
            'reply_id' =>auth()->user()->id,
        ]);
    }
    /**
     * This function forwrds staff permission requests to other office
     */
    public static function forwardPermissionRequest($permission_id,$user_type){
        PermissionRequest::whereId($permission_id)->update([
            'user_type'    =>$user_type,
        ]);
    }
    
}
