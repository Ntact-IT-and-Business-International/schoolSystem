<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\About\Entities\Faq;
use LivewireUI\Modal\ModalComponent;
use Session;

class AddFaq extends ModalComponent
{
    public $heading;
    public $question;

    //validate category
    protected $rules = [
        'heading'       => 'required',
        'question'   => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'heading.required' => 'Heading id is required',
        'question.required' => 'Amount paid is required',
    ];

    public function render()
    {
        return view('livewire.add-faq');
    }
    /**
     * This function creates Faq
     */
    public function submit()
    {
        $this->validate();
        $this->emit('Faq', 'refreshComponent');
        Faq::addFaq($this->heading,$this->question);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Faq creation is successful');
    }
}
