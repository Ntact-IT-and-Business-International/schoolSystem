<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Modules\Class\Entities\Classes;
use Modules\Library\Entities\Libray;
use Modules\Subject\Entities\Subject;
use Session;

class AddLibrary extends ModalComponent
{
    public $class_id;
    public $subject_id;
    public $title;
    public $number_of_books;
    public $date_of_entry;

    //validate category
    protected $rules = [
        'class_id'          => 'required',
        'subject_id'        => 'required',
        'date_of_entry'              => 'required',
        'number_of_books'           => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'class_id.required'      => 'Class is required',
        'subject_id.required'    => 'Subject is required',
        'date_of_entry.required' => 'Date is required',
        'number_of_books.required' => 'Number is required',
    ];

    public function render()
    {
        return view('livewire.add-library',[
            'subjects'=>Subject::get(),
            'classes' =>Classes::get()
        ]);
    }
    /**
     * This function creates holiday number_of_books
     */
    public function submit()
    {
        $this->validate();
        $this->emit('Library', 'refreshComponent');
        Libray::addLibraryBooks($this->class_id,$this->subject_id,$this->title,$this->number_of_books,$this->date_of_entry);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Operation is successful');
    }
}
