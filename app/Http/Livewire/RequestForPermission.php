<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use LivewireUI\Modal\ModalComponent;
use Modules\Permissions\Entities\PermissionRequest;
use Modules\Class\Entities\Classes;
use Modules\Staff\Entities\Staffs;
use Modules\Students\Entities\Student;
use App\Models\UserType;

class RequestForPermission extends ModalComponent
{
    public $class_id;
    public $staff_id;
    public $student_id;
    public $user_type;
    public $destination;
    public $reason;

    //validate data
    protected $rules = [
        'class_id'    => '',
        'student_id'  =>'',
        'staff_id'    => '',
        'user_type'   => '',
        'destination' => '',
        'reason'      => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'reason.required' => 'Reason is required',
    ];
    public function render()
    {
        return view('livewire.request-for-permission',[
            'staffs'=>Staffs::get(),
            'classes'=>Classes::get(),
            'students'=>Student::get(),
            'categories'=>UserType::get(),
        ]);
    }
    /**
     * This function creates permission Request
     */
    public function submit()
    {
        $this->validate();
        $this->emit('StaffPermission', 'refreshComponent');
        PermissionRequest::requestForPermission($this->student_id,$this->staff_id,$this->class_id,$this->user_type,$this->destination,$this->reason);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Permission Request Sent successfully');
    }
    
}
