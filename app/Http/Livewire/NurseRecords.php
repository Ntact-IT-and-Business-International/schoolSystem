<?php

namespace App\Http\Livewire;

use Modules\Nurse\Entities\Nurse;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class NurseRecords extends Component
{
    use WithPagination, WithSorting;
    protected $listeners = ['NurseRecords' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'students.last_name';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.nurse-records',[
            'records'=>Nurse::getNurse($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
