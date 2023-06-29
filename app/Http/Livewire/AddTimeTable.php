<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Modules\Staff\Entities\Staffs;
use Modules\Class\Entities\Classes;
use Modules\Subject\Entities\Subject;
use Modules\Timetable\Entities\TimeTable;
use Session;

class AddTimeTable extends ModalComponent
{
    public $staff_id;
    public $class_id;
    public $subject_id;
    public $starting_time;
    public $end_time;
    public $title;

    //validate category
    protected $rules = [
        'staff_id'   => 'required',
        'class_id'   => 'required',
        'subject_id' => 'required',
        'starting_time' => 'required',
        'end_time'   =>'required',
        'title'     => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'staff_id.required' => 'Staff is required',
        'class_id.required' => 'Class is required',
        'subject_id.required' => 'Subject is required',
        'starting_time.required' => 'Starting Time is required',
        'end_time.required' => 'Ending Time is required',
        'title.required' => 'titles is required',
    ];

    public function render()
    {
        return view('livewire.add-time-table',[
            'teachers' =>Staffs::get(),
            'classes' =>Classes::get(),
            'subjects' =>Subject::get(),
        ]);
    }
    /**
     * This function creates timeTable
     */
    public function submit()
    {
        $this->validate();
        $this->emit('TimeTables', 'refreshComponent');
        TimeTable::addTimeTable($this->staff_id,$this->class_id,$this->subject_id,$this->starting_time,$this->end_time,$this->title);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Timetable Details Added successfully');
    }
}
