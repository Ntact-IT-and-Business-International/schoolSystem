<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Store\Entities\Attendance;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class DailyAttendance extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['DailyAttendance' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'classes.level';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.daily-attendance',[
            'attendances'=>Attendance::getAttendance($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
    /**
     * This function deletes the daily Attendance
     */
    public static function deleteDailyAttendance($attendance_id)
    {
        Attendance::whereId($attendance_id)->delete();
        session()->flash('success', 'Operation Successful');
    }
}
