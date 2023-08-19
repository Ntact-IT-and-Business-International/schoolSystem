<?php

namespace Modules\Staff\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('staff::index');
    }

    /**
     * This function gets non teaching staff
     */
    public function nonTeachingStaff(){
        return view('staff::non_teaching_staff');
    } 
    /**
     * This function gets permissions for the staff 
     */
    public function requestedPermissions(){
        return view('staff::requested_permissions');
    }
    /**
     * This function gets my requuest for the staff 
     */
    public function myPermissionRequest(){
        return view('staff::my_requested_permissions');
    }
    /**
     * This function displays more staff information 
     */
    public function moreStaffInformation($staff_id){
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('staff::more_staff_information',compact('staff_id'));
    }
    /**
     * This function displays edit staff details form 
     */
    public function editStaff($staff_id){
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('staff::edit_staff_information',compact('staff_id'));
    }
    /**
     * This function displays edit pupils details form 
     */
    public function editPupilPermission($permission_id){
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('staff::edit_permission_information',compact('permission_id'));
    }
}
