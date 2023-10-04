<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ScholasticMaterials\Entities\Scholastic;

class EditItems extends Component
{
    public $scholastic_id;
    public $item_name;
    public $stock_quantity;

    protected $rules = [
        'item_name'        => 'required',
        'stock_quantity'           => 'required',
    ];

    public function render()
    {
        return view('livewire.edit-items',[
            'cholastics'=>Scholastic::editScholastic($this->scholastic_id)
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
     * This function updates ple results
     */
    public function updateItem()
    {
        $this->validate();
        Scholastic::updateScholasticInfo($this->scholastic_id,$this->item_name,$this->stock_quantity);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to('/expenditure/items')->with('msg', 'Your  Item has been edited successfully');
    }
}
