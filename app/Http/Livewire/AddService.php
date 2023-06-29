<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Services\Entities\Service;
use Session;
use App\Traits\SaveToFolder;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class AddService extends ModalComponent
{
    use SaveToFolder,WithFileUploads;

    public $service;
    public $image;
    public $content;

    //valicontent category
    protected $rules = [
        'service'    => 'required',
        'content'    =>'required',
        'image'      => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'service.required' => 'service is required',
        'content.required' => 'Content is required',
        'image.required' => 'Photo is required',
    ];

    public function render()
    {
        return view('livewire.add-service');
    }
    /**
 * This function creates Services
 */
    public function submit()
    {
        $this->validate();

        $this->emit('Services', 'refreshComponent'); 
        Service::addService($this->service,$this->content,$this->saveItemToFolder('service_photos', $this->image));
        $this->closeModal();
        Session::flash('msg', 'Team is successful created');
    }
}
