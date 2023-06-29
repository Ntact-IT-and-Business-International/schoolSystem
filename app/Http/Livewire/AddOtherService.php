<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Services\Entities\OtherService;
use Session;
use App\Traits\SaveToFolder;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class AddOtherService extends ModalComponent
{
    use SaveToFolder,WithFileUploads;

    public $other_service;
    public $description;

    //valicontent services
    protected $rules = [
        'other_service'    => 'required',
        'description'    =>'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'other_service.required' => 'service is required',
        'description.required' => 'Content is required',
    ];
    public function render()
    {
        return view('livewire.add-other-service');
    }
    /**
     * This function creates Services
     */
    public function submit()
    {
        $this->validate();

        $this->emit('OtherServices', 'refreshComponent'); 
        OtherService::addOtherService($this->other_service,$this->description);
        $this->closeModal();
        Session::flash('msg', 'Team is successful created');
    }
}
