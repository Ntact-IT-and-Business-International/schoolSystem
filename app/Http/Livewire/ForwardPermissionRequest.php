<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Permissions\Entities\PermissionRequest;
use App\Models\UserType;

class ForwardPermissionRequest extends Component
{
    public $user_type;
    public $permission_id;

    //validate category
    protected $rules = [
        'user_type'           => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'user_type.required' => 'Office to Forward is required',
    ];
    public function render()
    {
        return view('livewire.forward-permission-request',[
            'user_types'=>UserType::get()
        ]);
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
        PermissionRequest::forwardPermissionRequest($this->permission_id,$this->user_type);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        return redirect()->to('/staff/my-permission-requests')->with('msg', 'Permission Request  forwarded successful');
    }
}
