<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\ScholasticMaterials\Entities\ScholasticRequest;
use Session;

class AdminController extends Controller
{
    /**
     * This function approves the Request
     */
    public function approveRequest($request_id)
    {
        ScholasticRequest::whereId($request_id)->update(['status' => 'approved']);
        return redirect()->back()->with('msg', 'You have successfully Approved the Request');
    }
    /**
     * This function stops client from withdrawing money
     */
    public function rejectRequest($request_id){
        ScholasticRequest::whereId($request_id)->update(['status'=>'pending']);
        return redirect()->back()->with('msg', 'Operation Successful');
    }
}
