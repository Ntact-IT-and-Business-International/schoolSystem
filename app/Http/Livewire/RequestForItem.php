<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ScholasticMaterials\Entities\ScholasticRequest;
use LivewireUI\Modal\ModalComponent;
use Session;
use App\Models\UserType;
use Modules\ScholasticMaterials\Entities\Scholastic;

class RequestForItem extends ModalComponent
{
    public $item_id;
    public $number_of_items;
    public $requested_by;
    public $office;

    //validate category
    protected $rules = [
        'item_id'           => 'required',
        'number_of_items'   => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'item_id.required' => 'Item Name is required',
        'number_of_items.required' => 'Number of Items paid is required',
    ];

    public function render()
    {
        return view('livewire.request-for-item',[
            'items'=>Scholastic::get(),
            'offices'=>UserType::get(),
        ]);
    }
    /**
     * This function creates request for Items
     */
    public function submit()
    {
        $this->validate();
        $this->emit('RequestedItems', 'refreshComponent');
        ScholasticRequest::addScholasticRequest($this->item_id,$this->office,$this->number_of_items);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Scholastic Request is successful');
    }
}
