<?php

namespace Modules\Expenditure\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ExpenditureController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('expenditure::index');
    } 

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function salaries(){
        return view('expenditure::salary');
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function items(){
        return view('expenditure::items');
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function itemsRequest(){
        return view('expenditure::requested_items');
    }
    /**
     * This funtion show items requested from specific offices.
     */
    public function specificitemsRequest(){
        return view('expenditure::specific_office_request');
    }
    /**
     * This function edits salary details
     */
    public function editSalary($salary_id){
        return view('expenditure::edit_salary',compact('salary_id'));
    }
}
