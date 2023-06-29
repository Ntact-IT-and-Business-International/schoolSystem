<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Fees\Entities\FeesStructure;

class editFeeStructureStructure extends Component
{
    public $levels;
    public $category;
    public $fee_structure;
    public $term;

    //validate category
    protected $rules = [
        'levels'       => 'required',
        'term'   => 'required',
        'category'   => 'required',
        'fee_structure'     => 'required',
    ];

    public function render()
    {
        return view('livewire.edit-fee-structure',[
            'edit_fee_structure' =>FeesStructure::editFeeStructureStructure($fee_structure_id)
        ]);
    }
    /**
     * This function displays data to be edited
     */
    public function mount($fee_structure_id)
    {
        $this->fill([
            'levels' => FeesStructure::editFeeStructure($this->fee_structure_id)->value('levels'),
            'category' => FeesStructure::editFeeStructure($this->fee_structure_id)->value('category'),
            'term' => FeesStructure::editFeeStructure($this->fee_structure_id)->value('term'),
            'fee_structure' => FeesStructure::editFeeStructure($this->fee_structure_id)->value('fee_structure'),
        ]);
    }

    /**
     * This function updates Fees
     */
    public function updateFeesStructure()
    {
        $this->validate();
        FeesStructure::updateFeeStructureInfo($this->fee_structure_id,$this->staff_id,$this->category,$this->term,$this->fee_structure);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to(url()->previous())->with('msg', 'Your Fees Structure info has been edited successfully');
    }
}
