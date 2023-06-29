<?php

namespace App\Http\Livewire;
use Modules\Expenditure\Entities\Expenditure as Expenses;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class Expenditure extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['Expenditure' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'item';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.expenditure',[
            'expenditures' =>Expenses::getExpenditure($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
