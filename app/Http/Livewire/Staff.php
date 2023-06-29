<?php

namespace App\Http\Livewire;

use Modules\Staff\Entities\Staffs;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class Staff extends Component
{
    use WithPagination, WithSorting;

    //over ridding sortby from the trait
    public $sortBy = 'staffs.phone_number';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.staff',[
            'teaching_staffs' =>Staffs::getStaff($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
