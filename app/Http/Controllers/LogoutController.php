<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LogoutController extends Controller
{
    //This function redirects logged in user front page
    protected function logoutUser()
    {
        Auth::logout();
        return redirect('/');
    }
}
