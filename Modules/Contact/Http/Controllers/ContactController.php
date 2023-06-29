<?php

namespace Modules\Contact\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('contact::index');
    }
    /**
     * This function gets all the parents messages
     */
    public function parentMessages(){
        return view('contact::parents_message');
    }
    /**
     * This function gets all the parents messages
     */
    public function replyComplain($complain_id){
        return view('contact::reply_complain',compact('complain_id'));
    }
}
