<?php

namespace App\Http\Livewire\AccountSettings;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\User;
use Session;
use Hash;

class AddUser extends ModalComponent
{
    public $name;
    public $email;
    public $password;
    public $confirm_password;

    //validate category
    protected $rules = [
        'email'         => 'required',
        'password'      => 'required',
        'name'          => 'required',
        'confirm_password' => 'required|same:password',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'email.required' => 'Email year is required',
        'password.required' => 'Password per semester is required',
        'name.required' => 'Name is required',
        'confirm_password.required' => 'The Passwords are not Matching',
    ];

    public function render()
    {
        return view('livewire.account-settings.add-user');
    }
    /**
     * This function creates marketiers
     */
    public function submit()
    {
        $this->validate();
        $this->emit('Users', 'refreshComponent');
        $this->createAccount($this->name, $this->email,$this->password,$this->confirm_password);
        $this->closeModal();
        Session::flash('msg', 'User creation is successful');
    }
    /**
     * this function creates a user
     */
    private function createAccount($name, $email,$password)
    {
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
    }
}
