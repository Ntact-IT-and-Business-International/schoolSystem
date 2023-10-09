<?php

namespace App\Http\Livewire;
use Modules\TermDuration\Entities\TermsDuration;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Session;

class AddTermDuration extends ModalComponent
{
    public $term;
    public $start_date;
    public $end_date;

    //validate category
    protected $rules = [
        'term'       => 'required|unique:terms_durations',
        'start_date'      => 'required',
        'end_date'           => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'start_date.required' => 'Item  is required',
        'end_date.required' => 'end_date  is required',
        'term'           =>'Term already Exists just edit the Starting or Ending Date',
    ];

    public function render()
    {
        return view('livewire.add-term-duration');
    }
    /**
     * This function creates terms duration
     */
    public function submit()
    {
        $this->validate();
        $this->emit('TermDuration', 'refreshComponent');
        TermsDuration::addTermDuration($this->term,$this->start_date,$this->end_date);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Operation is successful');
    }
}
