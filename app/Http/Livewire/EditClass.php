<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Class\Entities\Classes;
use Session;

class EditClass extends Component
{
    public $class;
    public $class_id;

    protected $rules = [
        'class' => 'required:unique:classes',
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
            'class' => Classes::editClass($this->class_id)->value('class'),
        ]);
    }

    /**
     * This function updates class
     */
    public function updateClass()
    {
        $this->validate();
        Classes::updateClass($this->class_id, $this->class);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to(url()->previous())->with('msg', 'Your Class info has been edited successfully');
    }
}
