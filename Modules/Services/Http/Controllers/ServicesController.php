<?php

namespace Modules\Services\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable getServices
     */
    public function index()
    {
        return view('services::index');
    }

    /**
     * Thisfunction gets other services.
     */
    public function otherServices()
    {
        return view('services::other_services');
    }

    /**
     * This function gets services 
     */
    public function getServices(){
        return view('services::services');
    }
    /**
     * This function gets services 
     */
    public function events(){
        return view('services::events');
    }
}
