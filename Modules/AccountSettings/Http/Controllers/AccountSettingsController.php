<?php

namespace Modules\AccountSettings\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AccountSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function users()
    {
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('accountsettings::users');
    }

    /**
     * this function gets users category
     */
    public function category(){
        return view('accountsettings::category');
    }
    /**
     * this function gets users changepassword
     */
    public function changePassword(){
        return view('accountsettings::change_password');
    }
    /**
     * This function edit the users details
     */
    public function editUsers($user_id){
        return view('accountsettings::edit_user', compact('user_id'));
    }
}
