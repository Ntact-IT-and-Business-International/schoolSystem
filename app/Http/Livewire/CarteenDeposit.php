<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Carteen\Entities\CarteenDeposit as Deposits;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class CarteenDeposit extends Component
{
    use WithPagination, WithSorting;
    
    //This refreshes this page automatically
    protected $listeners = ['CarteenDeposit' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'students.last_name';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.carteen-deposit',[
            'cash_deposits' =>Deposits::getCarteenDeposit($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
