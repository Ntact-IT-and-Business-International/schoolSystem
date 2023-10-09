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

}
