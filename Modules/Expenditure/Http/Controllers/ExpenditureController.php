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
    /**
     * This function gets item
     */
    public function editItem($scholastic_id){
        return view('expenditure::edit_item',compact('scholastic_id'));
    }
    /**
     * This function edits items requested
     */
    public function editRequestedItem($request_id){
        return view('expenditure::edit_item_requested',compact('request_id'));
    }
    /**
     * This function edits items requested
     */
    public function rejectRequestedItem($request_id){
        return view('expenditure::reject_item_requested',compact('request_id'));
    }
    /**
     * This function edits expenditure
     */
    public function editExpenditure($expenditure_id){
        return view('expenditure::edit_expenditure',compact('expenditure_id'));
    }
}
