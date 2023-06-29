<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ScholasticMaterials\Entities\ScholasticRequest;
use Modules\ScholasticMaterials\Entities\Scholastic;

class EditRequestedItems extends Component
{
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
        return view('livewire.edit-requested-items',[
            'items_requested' =>ScholasticRequest::editScholasticRequest($request_id),
            'items' =>Scholastic::get()
        ]);
    }
    /**
     * This function displays data to be edited
     */
    public function mount($request_id)
    {
        $this->fill([
            'item_id' => ScholasticRequest::editScholasticRequest($this->request_id)->value('item_id'),
            'number_of_items' => ScholasticRequest::editScholasticRequest($this->request_id)->value('number_of_items'),
        ]);
    }

    /**
     * This function updates scholastic materials
     */
    public function updateRequestedItems()
    {
        $this->validate();
        ScholasticRequest::updateScholasticRequestInfo($this->request_id,$this->item_id,$this->number_of_items);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to(url()->previous())->with('msg', 'Your Scholastic  Requested Materials info has been edited successfully');
    }
}
