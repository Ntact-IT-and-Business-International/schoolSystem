<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\WithPagination;
use Modules\Timetable\Entities\TimeTable;

class Timetables extends Component
{
    use WithPagination, WithSorting;
    
    //This refreshes this page automatically
    protected $listeners = ['Timetables' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'id';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.timetables',[
            'time_tables'=>TimeTable::getTimeTable($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
