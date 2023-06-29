<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ScholasticMaterials\Entities\ScholasticRequest;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class SpecificOfficeRequests extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['SpecificOfficeRequests' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'id';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.specific-office-requests',[
            'items_requested' =>ScholasticRequest::specificOfficeRequest($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
