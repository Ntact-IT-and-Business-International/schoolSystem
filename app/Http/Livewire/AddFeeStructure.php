<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Fees\Entities\FeesStructure;
use LivewireUI\Modal\ModalComponent;
use Session;
use App\Traits\SaveToFolder;
use Livewire\WithFileUploads;

class AddFeeStructure extends ModalComponent
{
    use SaveToFolder,WithFileUploads;
    public $levels;
    public $category;
    public $fee_structure;
    public $term;

    //validate category
    protected $rules = [
        'levels'        => 'required',
        'category'      => 'required',
        'fee_structure' => 'required',
        'term'          =>'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'levels.required' => 'Levels is required',
        'category.required' => 'Category paid is required',
        'fee_structure.required' => 'Fee Structure is required',
        'term.required' => 'Term is required',
    ];

    public function render()
    {
        return view('livewire.add-fee-structure');
    }
    /**
     * This function creates Fees Structure
     */
    public function submit()
    {
        $this->validate();
        $this->emit('FeeStructure', 'refreshComponent');
        FeesStructure::addFeeStructure($this->levels,$this->category,$this->term,$this->saveItemToFolder('Fees_structure', $this->fee_structure));
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Fees Structure creation is successful');
    }
}
