<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ScholasticMaterials\Entities\Scholastic;
use LivewireUI\Modal\ModalComponent;
use Session;

class AddScholasticMaterials extends ModalComponent
{
    public $item_name;
    public $stock_quantity;

    //validate category
    protected $rules = [
        'item_name'       => 'required',
        'stock_quantity'   => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'item_name.required' => 'Item Name is required',
        'stock_quantity.required' => 'Stock Quantity paid is required',
    ];

    public function render()
    {
        return view('livewire.add-scholastic-materials');
    }
    /**
     * This function creates Scholastic Materials
     */
    public function submit()
    {
        $this->validate();
        $this->emit('ScholasticMaterials', 'refreshComponent');
        Scholastic::addScholastic($this->item_name,$this->stock_quantity);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Scholastic creation is successful');
    }
}
