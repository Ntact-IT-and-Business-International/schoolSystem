<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Contact\Entities\Complains;
use Session;
use LivewireUI\Modal\ModalComponent;

class ReplyComplain extends ModalComponent
{
    public $reply;
    public $complain_id;

    //validate Parents messagesy
    protected $rules = [
        'reply' => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'reply.required' => 'Reply is required',
    ];
    public function render()
    {
        return view('livewire.reply-complain');
    }
    /**
     * This function gets model for replying parents complain
     */
    public function replyParentsComplain(){
        Complains::replyComplains($this->complain_id,$this->reply);
        return redirect()->to('/contact/parents-messages');
    }
    public function mount($complain_id){
        $this->complain_id =$complain_id;
    }
}
