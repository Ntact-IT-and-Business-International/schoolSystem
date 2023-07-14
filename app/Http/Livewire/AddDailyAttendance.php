<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use LivewireUI\Modal\ModalComponent;
use Modules\Store\Entities\Attendance;
use Modules\Class\Entities\Classes;

class AddDailyAttendance extends ModalComponent
{
    public $class_id;
    public $boys;
    public $term;
    public $girls;
    public $date;

    //valiterm category
    protected $rules = [
        'class_id' => 'required',
        'term'     =>'required',
        'boys'   => 'required',
        'date'     => 'required',
        'girls'     => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'class_id.required' => 'Item is required',
        'date.required' => 'Date is required',
        'boys.required' => 'Boys is required',
        'term.required' => 'Term is required',
        'girls.required' => 'girls is required',
    ];
    public function render()
    {
        return view('livewire.add-daily-attendance',[
            'classes'=>Classes::get()
        ]);
    }
    /**
     * This function creates Attendance
     */
    public function submit()
    {
        $this->validate();

        $this->emit('DailyAttendance', 'refreshComponent'); 
        Attendance::addAttendance($this->class_id,$this->term,$this->date,$this->boys,$this->girls);
        $this->closeModal();
        Session::flash('msg', 'Attendance is successful created');
    }
}
