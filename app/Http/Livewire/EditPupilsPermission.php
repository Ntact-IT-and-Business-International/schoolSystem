<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Permissions\Entities\PermissionRequest;

class EditPupilsPermission extends Component
{
    public $permission_id;
    public $destination;
    public $reason;

    //validate category
    protected $rules = [
        'destination'        => 'required',
        'reason'              => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [        'class_id.required' => 'Class is required',
        'reason.required' => 'Reason eason required',
        'destination.required'       => 'Destination is required',
    ];
    public function render()
    {
        return view('livewire.edit-pupils-permission',[
            'edit_pupils_permissions'=>PermissionRequest::editPermissions($this->permission_id)
        ]);
    }
    /**
     * This function displays data to be edited
     */
    public function mount($permission_id)
    {
        $this->fill([
            'destination' => PermissionRequest::editPermissions($this->permission_id)->value('destination'),
            'reason' => PermissionRequest::editPermissions($this->permission_id)->value('reason'),
        ]);
    }

    /**
     * This function updates ple results
     */
    public function updatePupilsPermission()
    {
        $this->validate();
        PermissionRequest::updatePermissionRequestInfo($this->permission_id,$this->destination,$this->reason);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to('/staff/request-for-permission')->with('msg', 'Your Permission Request Updated successfully');
    }
}
