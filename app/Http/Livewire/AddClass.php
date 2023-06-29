<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Modules\Class\Entities\Classes;
use Session;

class AddClass extends ModalComponent
{
    public $level;

    //validate category
    protected $rules = [
        'level'       => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'level.required' => 'Class is required',
    ];

    public function render()
    {
        return view('livewire.add-class');
    }
    /**
     * This function creates class
     */
    public function submit()
    {
        $this->validate();
        $this->emit('Classes', 'refreshComponent');
        Classes::addClasses($this->level);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Class creation is successful');
    }
}
