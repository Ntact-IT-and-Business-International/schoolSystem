<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Modules\Store\Entities\DosOffice;
use Modules\Staff\Entities\Staffs;
use Modules\ScholasticMaterials\Entities\Scholastic;
use Session;

class DosOfficeRecords extends ModalComponent
{
    public $staff_id;
    public $items_id;
    public $term;
    public $units;
    public $quantity;
    public $date;

    //valiterm category
    protected $rules = [
        'staff_id' => 'required',
        'term'     =>'required',
        'items_id' => 'required',
        'date'     => 'required',
        'units'     => 'required',
        'quantity' =>'required'
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'staff_id.required' => 'Item is required',
        'date.required' => 'Date is required',
        'term.required' => 'Term is required',
        'units.required' => 'Unit is required',
        'quantity.required' => 'Person is required',
    ];
    public function render()
    {
        return view('livewire.dos-office-records',[
            'items'=>Scholastic::get(),
            'staffs'=>Staffs::get(),
        ]);
    }
    /**
     * This function creates Dos Records
     */
    public function submit()
    {
        $this->validate();

        $this->emit('DosOffice', 'refreshComponent'); 
        DosOffice::addItemsGivenOut($this->staff_id,$this->term,$this->date,$this->units,$this->quantity,$this->items_id);
        $this->closeModal();
        Session::flash('msg', 'Your Records is successful saved');
    }
}
