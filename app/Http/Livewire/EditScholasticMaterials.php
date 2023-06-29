<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ScholasticMaterials\Entities\Scholastic;

class EditScholasticMaterials extends Component
{
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
        return view('livewire.edit-scholastic-materials',[
            'edit_scholastic_materials'=>Scholastic::editScholastic($this->scholastic_id),
        ]);
    }
    /**
     * This function displays data to be edited
     */
    public function mount($scholastic_id)
    {
        $this->fill([
            'item_name' => Scholastic::editScholastic($this->scholastic_id)->value('item_name'),
            'stock_quantity' => Scholastic::editScholastic($this->scholastic_id)->value('stock_quantity'),
        ]);
    }

    /**
     * This function updates scholastic materials
     */
    public function updateScholastic()
    {
        $this->validate();
        Scholastic::updateScholasticInfo($this->scholastic_id,$this->item_name,$this->stock_quantity);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to(url()->previous())->with('msg', 'Your Scholastic Materials info has been edited successfully');
    }
}
