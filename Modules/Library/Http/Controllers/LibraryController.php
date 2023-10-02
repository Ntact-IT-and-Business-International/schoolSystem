<?php

namespace Modules\Library\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('library::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function editLibrary($library_id){
        return view('library::edit_library',compact('library_id'));
    }
}
