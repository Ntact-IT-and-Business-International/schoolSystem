<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Nurse\Entities\NurseRequest;
use LivewireUI\Modal\ModalComponent;
use App\Models\UserType;
use Modules\Nurse\Entities\SickbayItem;
use Session;

class MakeSickbayRequest extends ModalComponent
{

    public $medicine_id;
    public $quantity;
    public $type;
    public $amount;
    public $office_incharge_id;

    //validate category
    protected $rules = [
        'medicine_id'        => 'required',
        'quantity'           => 'required',
        'amount'             => 'required',
        'type'               => 'required',
        'office_incharge_id' => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'medicine_id.required' => 'Medicine is required',
        'quantity.required'    => 'Quantity is required',
        'amount.required'      => 'Amount is required',
        'type.required'        => 'Type is required',
    ];

    public function render()
    {
        return view('livewire.make-sickbay-request',[
            'sickbay_requests' =>SickbayItem::get(),
            'user_types'=>UserType::get()
        ]);
    }
    /**
     * This function makes request for the sickbay
     */
    public function submit()
    {
        $this->validate();
        $this->emit('NurseRequests', 'refreshComponent');
        NurseRequest::addNurseRequests($this->medicine_id,$this->quantity,$this->amount,$this->office_incharge_id,$this->type);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Operation is successful');
    }
}
