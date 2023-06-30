<?php

namespace Modules\Permissions\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Permissions\Entities\UserTypePermission;
use Auth;

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
    public function userTypePermissions($category_id){
        return view('permissions::user_types_permissions',compact('category_id'));
    }
    /**
     * This function gets all Particular users types permissions
     */
    public function permission($user_type_id){
        return view('permissions::permissions',compact('user_type_id'));
    }
    /**
     * This function adds permissions to usertype
     */
    public function assignPermission($user_type_id, Request $request){
        if(empty($request->user_permisions)){
            return redirect()->back()->withErrors("No updates were made, you didn't select any permision");
        }
        $permissions = $request->user_permisions;
            foreach($permissions as $permission){
                if(UserTypePermission::where('usertype_id',$user_type_id)->where('permission_id',$permission)->exists()){
                    continue;
                }
                else{
                    UserTypePermission::create(array(
                        'usertype_id' => $user_type_id,
                        'permission_id' => $permission,
                        'created_by'     => Auth::user()->id
                    ));
                }
            }
        return Redirect()->back()->with('msg',"Permission(s) added Successfully");
    }
}
