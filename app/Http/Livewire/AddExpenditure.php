<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Expenditure\Entities\Expenditure;
use LivewireUI\Modal\ModalComponent;
use App\Models\UserType;
use Session;

class AddExpenditure extends ModalComponent
{
    public $item;
    public $quantity;
    public $unit_price;
    public $amount;
    public $signed_by;
    public $user_type_id;

    //validate category
    protected $rules = [
        'item'       => 'required',
        'quantity'   => 'required',
        'unit_price' => 'required',
        'amount'     => 'required',
        'signed_by'  => 'required',
        'user_type_id'=>'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'item.required' => 'Item is required',
        'quantity.required' => 'Quantity is required',
        'unit_price.required' => 'Unit Price is required',
        'amount.required' => 'Amount is required',
        'signed_by.required' => 'Name is required',
        'user_type_id'       =>'User Typeis required'
    ];

    public function render()
    {
        return view('livewire.add-expenditure',[
            'user_types' =>UserType::get()
        ]);
    }
    /**
     * This function creates expenditure
     */
    public function submit()
    {
        $this->validate();
        $this->emit('Expenditure', 'refreshComponent');
        Expenditure::addExpenditure($this->item,$this->user_type_id,$this->quantity,$this->unit_price,$this->amount,$this->signed_by);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Expenditure creation is successful');
    }
}
