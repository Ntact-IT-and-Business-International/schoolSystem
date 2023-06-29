<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Contact\Entities\Complains;
use Session;
use LivewireUI\Modal\ModalComponent;
use Modules\Students\Entities\Student;
use Modules\Class\Entities\Classes;

class AddComplain extends ModalComponent
{
    public $class_id;
    public $student_id;
    public $complain;

    //validate Parents messagesy
    protected $rules = [
        'class_id' => 'required',
        'student_id'     =>'required',
        'complain'   => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'class_id.required' => 'Class is required',
        'date.required' => 'Date is required',
        'student_id.required' => 'Student is required',
        'complain.required' => 'Complain is required',
    ];
    public function render()
    {
        return view('livewire.add-complain',[
            'students'=>Student::get(),
            'classes'=>Classes::get()
        ]);
    }
    public function submit(){
        $this->validate();

        $this->emit('Complains', 'refreshComponent'); 
        Complains::addComplain($this->student_id,$this->class_id,$this->complain);
        $this->closeModal();
        Session::flash('msg', 'Attendance is successful created');
    }
}
