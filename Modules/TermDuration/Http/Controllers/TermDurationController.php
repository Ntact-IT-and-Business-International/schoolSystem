<?php

namespace Modules\TermDuration\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TermDurationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('termduration::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function getDuration()
    {
        return view('termduration::terms_duration');
    }
    /**
     * This function gets form for editing term duration
     */
    public function editTermDuration($term_duration_id){
        return view('termduration::edit_term_duration',compact('term_duration_id'));
    }
}
