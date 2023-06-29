<?php

namespace App\Http\Livewire;

use Modules\Staff\Entities\Staffs;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class NonTeachingStaff extends Component
{
    use WithPagination, WithSorting;

    //over ridding sortby from the trait
    public $sortBy = 'staffs.id';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.non-teaching-staff',[
            'non_teaching_staffs' =>Staffs::getNonTeachingStaff($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
