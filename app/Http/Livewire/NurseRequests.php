<?php

namespace App\Http\Livewire;
use Modules\Nurse\Entities\NurseRequest;

use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class NurseRequests extends Component
{
    use WithPagination, WithSorting;
    protected $listeners = ['NurseRequests' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'sickbay_items.medicine_name';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.nurse-requests',[
            'nurse_requests'=>NurseRequest::getNurseRequest($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
