<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Modules\About\Entities\OurTeam;
use Session;
use App\Traits\SaveToFolder;
use Livewire\WithFileUploads;
use App\Models\User;

class AddTeam extends ModalComponent
{
    use SaveToFolder,WithFileUploads;

    public $staff_id;
    public $title;
    public $contact;
    public $photo;

    //validate category
    protected $rules = [
        'staff_id'       => '',
        'title'     => 'required',
        'contact'      => 'required',
        'photo'          => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'title.required' => 'Title is required',
        'contact.required' => 'Lastname is required',
        'photo.required' => 'Photo is required',
    ];

    public function render()
    {
        return view('livewire.add-team',[
            'staffs'=>User::whereIn('user_type',[2,3,4,5,12,13])->get()
        ]);
    }
    /**
     * This function creates team
     */
    public function submit()
    {
        $this->validate();

        $this->emit('Team', 'refreshComponent'); 
        OurTeam::addTeam($this->staff_id,$this->title,$this->contact,$this->saveItemToFolder('team_photos', $this->photo));
        $this->closeModal();
        Session::flash('msg', 'Team is successful created');
    }
}
