<?php

namespace App\Http\Livewire;

use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Fees\Entities\FeesStructure;

class FeeStructure extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['FeeStructure' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'fees_structures.levels';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.fee-structure',[
            'fees_structures' =>FeesStructure::getFeeStructure($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
