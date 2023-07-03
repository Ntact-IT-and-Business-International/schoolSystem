<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;


class DashboardController extends Controller
{
    //
    public function adminDashboard(){
    return view('dashboard');
    }
}
