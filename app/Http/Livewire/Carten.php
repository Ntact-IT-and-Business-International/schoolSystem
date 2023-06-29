<?php

namespace App\Http\Livewire;

use Modules\Carteen\Entities\Carteen;
use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class Carten extends Component
{
    use WithPagination, WithSorting;
    
    //This refreshes this page automatically
    protected $listeners = ['Carten' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'students.last_name';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.carten',[
            'canteens'=>Carteen::getCarteenSpendings($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
