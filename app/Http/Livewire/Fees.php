<?php

namespace App\Http\Livewire;
use Modules\Fees\Entities\Fee;

use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class Fees extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['Fees' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'students.last_name';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.fees',[
            'fees'=>Fee::getFees($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
