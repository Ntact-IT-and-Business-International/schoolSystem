<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Services\Entities\Service;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class Services extends Component
{
    use WithPagination, WithSorting;
     //This refreshes this page automatically
    protected $listeners = ['Services' => '$refresh'];
    //over ridding sortby from the trait
    public $sortBy = 'service';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.services',[
            'services'=>Service::getService($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
