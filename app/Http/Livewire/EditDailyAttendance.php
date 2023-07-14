<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Store\Entities\Attendance;

class EditDailyAttendance extends Component
{
    public $boys;
    public $girls;
    public $date;
    public $term;
    public $attendance_id;

    //valiterm category
    protected $rules = [
        'boys'   => 'required',
        'date'     => 'required',
        'girls'     => 'required',
        'term'     => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'boys.required' => 'Boys is required',
        'date.required' => 'Date is required',
        'girls.required' => 'Girls is required',
        'term.required' => 'Term is required',
    ];

    public function render()
    {
        return view('livewire.edit-daily-attendance',[
            'edit_daily_attendance'=>Attendance::editAttendance($this->attendance_id)
        ]);
    }
    /**
     * This function displays data to be edited
     */
    public function mount($attendance_id)
    {
        $this->fill([
            'boys' => Attendance::editAttendance($this->attendance_id)->value('boys'),
            'girls' => Attendance::editAttendance($this->attendance_id)->value('girls'),
            'date' => Attendance::editAttendance($this->attendance_id)->value('date'),
            'term' => Attendance::editAttendance($this->attendance_id)->value('term'),
        ]);
    }
    /**
     * This function updates daily Attendance
     */
    public function updateDailyAttendance()
    {
        $this->validate();
        Attendance::updateAttendanceInfo($this->attendance_id,$this->term,$this->date,$this->boys,$this->girls);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to('/students/attendance')->with('msg', 'Attendance info has been edited successfully');
    }
}
