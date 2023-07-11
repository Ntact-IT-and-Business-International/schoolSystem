<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\WithPagination;
use Modules\Timetable\Entities\TimeTable;
use DB;
use Carbon\Carbon;

class Timetables extends Component
{
    use WithPagination, WithSorting;
    public $distinctDay =[];
    
    //This refreshes this page automatically
    protected $listeners = ['Timetables' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'id';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.timetables',[
            'time_tables'=>TimeTable::getTimeTable($this->search, $this->sortBy, $this->sortDirection, $this->perPage),
            'days_of_week' =>TimeTable::distinct('day')->get(['day']),
            'hours' =>$this->getLessonHours()
        ]);
    }
    private function getLessonHours(){
        return TimeTable::get();
    }
    private function getTeachers(){
        return TimeTable::join('staffs','staffs.id','time_tables.staff_id')->get(['staffs.staff_last_name','staffs.staff_first_name','staffs.staff_other_names']);
    }

}
