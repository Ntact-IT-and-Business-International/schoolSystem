<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\UserType;

class EditUser extends Component
{
    public $user_id;
    public $user_type;
    public $name;
    public $email;

    public function render()
    {
        return view('livewire.edit-user',[
            'users'=>User::editUser($this->user_id),
            'user_types'=>UserType::get()
        ]);
    }
    //validate category
    protected $rules = [
        'name'       => 'required',
        'email'      => 'required',
        'user_type'  => 'required',
    ];

    public function mount($user_id){
        $this->fill([
            'name' => User::editUser($this->user_id)->value('name'),
            'email' => User::editUser($this->user_id)->value('email'),
            'user_type' => User::editUser($this->user_id)->value('user_type'),
        ]);
    }
    /**
     * This function updates User
     */
    public function updateUser()
    {
        $this->validate();
        User::updateUser($this->user_id, $this->name,$this->email,$this->user_type);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to(url()->previous())->with('msg', 'User info has been edited successfully');
    }
}
