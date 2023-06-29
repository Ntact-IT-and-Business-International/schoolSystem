<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Contact\Entities\Message;

class FrontPagesController extends Controller
{
    //This function gets about us 
    public function aboutUs(){
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('FrontPages.about');
    }
     //This function gets services 
    public function services(){
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('FrontPages.services');
    } 
    //This function gets portifolio 
    public function portfolio(){
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('FrontPages.portfolio');
    }
    //This function gets ple results 
    public function results(){
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('FrontPages.ple_results');
    } 
     //This function gets contact form 
    public function contact(){
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('FrontPages.contact');
    }
    //This function gets jobs page 
    public function jobs(){
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('FrontPages.jobs');
    }
    //  //This function validates the message creation
    // private function validate()
    // {
    //     return request()->validate([
    //         'name' => 'required',
    //         'contact' => 'required',
    //         'message' => 'required',
    //     ]);
    // }
    // protected $messages = [
    //     'names' => 'Name is required',
    //     'contact' => 'Contact is required',
    //     'message' => 'Message is required',
    // ];
    /**
     * This function saves messages sent
     */
    public function sendMessage(){
        //$this->validate();
        $message = new Message;
        $message->names    =request()->names;
        $message->contact  =request()->contact;
        $message->subject  =request()->subject;
        $message->message  =request()->message;
        $message->save();

        return Redirect()->back()->with('msg','Your Message is sent successfully');
    }
    
}
