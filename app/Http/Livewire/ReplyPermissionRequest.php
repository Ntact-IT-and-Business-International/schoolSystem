<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Permissions\Entities\PermissionRequest;
use Session;

class ReplyPermissionRequest extends Component
{
    public $reply;
    public $reply_id;
    public $permission_id;

    //validate category
    protected $rules = [
        'reply'           => 'required',
        'reply_id'   => '',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'reply.required' => 'Reply is required',
    ];

    public function render()
    {
        return view('livewire.reply-permission-request');
    }
    public function mount($permission_id){
        $this->permission_id =$permission_id;
    }
    /**
     * This function replies the permissionrequests
     */
    public function submit()
    {
        $this->validate();
        PermissionRequest::replyPermissionRequest($this->permission_id,$this->reply);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        return redirect()->to('/permissions/all-staff-permission-requests')->with('msg', 'Permission Request  replied successful');
    }
}
