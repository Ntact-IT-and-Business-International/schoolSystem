<?php

namespace Modules\Store\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function food()
    {
        return view('store::food');
    }

    /**
     * This function gets Dos Information.
     */
    public function Dos()
    {
        return view('store::dos_office');
    }
}
