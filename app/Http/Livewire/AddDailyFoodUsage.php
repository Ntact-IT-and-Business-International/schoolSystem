<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Store\Entities\Store;
use Modules\ScholasticMaterials\Entities\Scholastic;
use Session;
use App\Traits\SaveToFolder;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class AddDailyFoodUsage extends ModalComponent
{
    use SaveToFolder,WithFileUploads;

    public $itemm_id;
    public $number;
    public $term;
    public $unit;
    public $responsible_person;
    public $date;

    //valiterm category
    protected $rules = [
        'itemm_id' => 'required',
        'term'     =>'required',
        'number'   => 'required',
        'date'     => 'required',
        'unit'     => 'required',
        'responsible_person' =>'required'
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'itemm_id.required' => 'Item is required',
        'date.required' => 'Date is required',
        'term.required' => 'Term is required',
        'unit.required' => 'Unit is required',
        'responsible_person.required' => 'Person is required',
    ];
    public function render()
    {
        return view('livewire.add-daily-food-usage',[
            'items'=>Scholastic::get()
        ]);
    }
    /**
     * This function creates stores
     */
    public function submit()
    {
        $this->validate();

        $this->emit('Food', 'refreshComponent'); 
        Store::addStore($this->itemm_id,$this->term,$this->number,$this->date,$this->unit,$this->responsible_person);
        $this->closeModal();
        Session::flash('msg', 'Store is successful created');
    }
}
