<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Nurse\Entities\SickbayItem;
use LivewireUI\Modal\ModalComponent;
use Session;

class AddSickbayItems extends ModalComponent
{
    public $medicine_name;

    //validate 
    protected $rules = [
        'medicine_name'          => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'medicine_name.required'      => 'Name of Medicine is required',
    ];

    public function render()
    {
        return view('livewire.add-sickbay-items');
    }
    /**
     * This function creates sickbay
     */
    public function submit()
    {
        $this->validate();
        $this->emit('SickbayItems', 'refreshComponent');
        SickbayItem::addMedicine($this->medicine_name);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Operation is successful');
    }
}
