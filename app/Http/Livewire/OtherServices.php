<?php

namespace App\Http\Livewire;
use Modules\Services\Entities\OtherService;

use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class OtherServices extends Component
{
    use WithPagination, WithSorting;
    protected $listeners = ['OtherServices' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'other_service';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.other-services',[
            'other_services'=>OtherService::getOtherService($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
