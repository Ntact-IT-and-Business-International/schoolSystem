<?php

namespace Modules\Subject\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('subject::index');
    }

    /**
     * This function updates the subject
     */
    public function editSubject($subject_id){
        return view('subject::edit_subject', compact('subject_id')); 
    }
}
