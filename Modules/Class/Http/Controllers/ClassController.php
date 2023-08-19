<?php

namespace Modules\Class\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable edit
     */
    public function index()
    {
        return view('class::index');
    }
    /**
     * This function edit class
     */
    public function edit($class_id)
    {
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('class::edit_class',compact('class_id'));
    }
}
