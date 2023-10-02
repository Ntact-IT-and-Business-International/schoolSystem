<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Library\Entities\Libray;
use Modules\Subject\Entities\Subject;
use Modules\Class\Entities\Classes;
use Session;

class EditLibrary extends Component
{
    public $subject_id;
    public $class_id;
    public $title;
    public $date_of_entry;
    public $number_of_books;
    public $status;
    public $library_id;

    protected $rules = [
        'subject_id'      => 'required',
        'class_id'        => 'required',
        'title'           => 'required',
        'date_of_entry'   => 'required',
        'number_of_books' => 'required',
        'status' =>       'required',
    ];

    public function render()
    {
        return view('livewire.edit-library',[
            'edit_library' =>Libray::editLibrary($this->library_id),
            'subjects'=>Subject::get(),
            'classes' =>Classes::get()
        ]);
    }
    /**
     * This function displays data to be edited
     */
    public function mount($library_id)
    {
        $this->fill([
            'subject_id' => Libray::editLibrary($this->library_id)->value('subject_id'),
            'class_id'   => Libray::editLibrary($this->library_id)->value('class_id'),
            'title'      => Libray::editLibrary($this->library_id)->value('title'),
            'date_of_entry' => Libray::editLibrary($this->library_id)->value('date_of_entry'),
            'number_of_books' => Libray::editLibrary($this->library_id)->value('number_of_books'),
            'status' => Libray::editLibrary($this->library_id)->value('status'),
        ]);
    }

    /**
     * This function updates library
     */
    public function updateLibrary()
    {
        $this->validate();
        Libray::updateLibraryInfo($this->library_id,$this->subject_id,$this->class_id,$this->title,$this->number_of_books,$this->date_of_entry,$this->status);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to('/library/library')->with('msg', 'Your Subject info has been edited successfully');
    }
}
