<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Class\Entities\Classes;
use Session;

class EditClass extends Component
{
    public $class;
    public $class_id;
    public $level;

    protected $rules = [
        'level' => 'required:unique:classes',
    ];
    public function render()
    {
        return view('livewire.edit-class',[
            'edit_class' => Classes::editClass($this->class_id),
        ]);
    }
    /**
     * This function displays data to be edited
     */
    public function mount($class_id)
    {
        $this->fill([
            'level' => Classes::editClass($this->class_id)->value('level'),
        ]);
    }

    /**
     * This function updates class
     */
    public function updateClass()
    {
        $this->validate();
        Classes::updateClasses($this->class_id, $this->level);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to('/class/classes')->with('msg', 'Your Class info has been edited successfully');
    }
}
