<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Services\Entities\Event;
use Session;
use App\Traits\SaveToFolder;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class AddEvent extends ModalComponent
{
    use SaveToFolder,WithFileUploads;

    public $title;
    public $event_image;
    public $date;

    //validate category
    protected $rules = [
        'title'       => 'required',
        'date'        =>'required',
        'event_image' => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'title.required' => 'Title is required',
        'event_image.required' => 'Photo is required',
    ];

    public function render()
    {
        return view('livewire.add-event');
    }
    /**
     * This function creates Event
     */
    public function submit()
    {
        $this->validate();

        $this->emit('Events', 'refreshComponent'); 
        Event::addEvent($this->title,$this->date,$this->saveItemToFolder('event_photos', $this->event_image));
        $this->closeModal();
        Session::flash('msg', 'Team is successful created');
    }
}
