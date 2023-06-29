<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Modules\Subject\Entities\Subject;
use Session;

class AddSubject extends ModalComponent
{
    public $subject;

    //validate category
    protected $rules = [
        'subject'       => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'subject.required' => 'Class is required',
    ];

    public function render()
    {
        return view('livewire.add-subject');
    }
    /**
     * This function creates subject
     */
    public function submit()
    {
        $this->validate();
        $this->emit('Subjects', 'refreshComponent');
        Subject::addSubject($this->subject);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Subject creation is successful');
    }
}
