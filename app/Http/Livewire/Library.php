<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Library\Entities\Libray;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class Library extends Component
{
    use WithPagination, WithSorting;
    
    //This refreshes this page automatically
    protected $listeners = ['Library' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'librays.title';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.library',[
            'libraries'=>Libray::getLibrary($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
