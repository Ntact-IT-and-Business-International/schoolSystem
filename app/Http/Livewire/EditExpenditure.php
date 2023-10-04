<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Expenditure\Entities\Expenditure;
use Session;

class EditExpenditure extends Component
{
    public $item;
    public $quantity;
    public $unit_price;
    public $amount;
    public $signed_by;
    public $expenditure_id;
    public $term;

    //validate category
    protected $rules = [
        'item'       => 'required',
        'quantity'   => 'required',
        'unit_price' => 'required',
        'amount'     => 'required',
        'signed_by'  => 'required',
        'term'  => 'required',
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
        'term.required' => 'Term is required',
    ];
    public function render()
    {
        return view('livewire.edit-expenditure',[
            'edit_expenditure' =>Expenditure::editExpenditure($this->expenditure_id)
        ]);
    }
    /**
     * This function displays data to be edited
     */
    public function mount($expenditure_id)
    {
        $this->fill([
            'item' => Expenditure::editExpenditure($this->expenditure_id)->value('item'),
            'quantity' => Expenditure::editExpenditure($this->expenditure_id)->value('quantity'),
            'unit_price' => Expenditure::editExpenditure($this->expenditure_id)->value('unit_price'),
            'amount' => Expenditure::editExpenditure($this->expenditure_id)->value('amount'),
            'signed_by' => Expenditure::editExpenditure($this->expenditure_id)->value('signed_by'),
            'term' => Expenditure::editExpenditure($this->expenditure_id)->value('term'),
        ]);
    }

    /**
     * This function updates Expenditure
     */
    public function updateExpenditure()
    {
        $this->validate();
        Expenditure::updatExpenditureInfo($this->expenditure_id,$this->item,$this->quantity,$this->unit_price,$this->amount,$this->signed_by,$this->term);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to('/expenditure/expenditure')->with('msg', 'Your Expenditure info has been edited successfully');
    }
}
