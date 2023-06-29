<?php

namespace Modules\Permissions\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PermissionsController extends Controller
{
    /**
     * This function gets all staff permissions
     */
    public function staffPermissionRequests()
    {
        return view('permissions::all_staff_permission_requests');
    }
    /**
     * This function gets all students permissions
     */
    public function studentsPermissionRequests()
    {
        return view('permissions::all_students_permission_requests');
    }
    /**
     * This function gets all students permissions
     */
    public function replyPermissionRequests($permission_id)
    {
        return view('permissions::reply_permission',compact('permission_id'));
    }
    /**
     * This function forwards permission requests
     */
    public function forwardPermissionRequests($permission_id)
    {
        return view('permissions::forward_permission',compact('permission_id'));
    } 
    /**
     * This function gets all users types for permissions
     */
    public function allUserTypesForPermission(){
        return view('permissions::user_types_for_permissions');
    }
    /**
     * This function gets all particular users types Permissions
     */
    public function userTypePermissions($permission_id){
        return view('permissions::user_types_permissions',compact('permission_id'));
    }
    /**
     * This function gets all Particular users types permissions
     */
    public function permission(){
        return view('permissions::permissions');
    }
}
