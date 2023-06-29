<?php

namespace App\Http\Livewire\AccountSettings;

use Livewire\Component;
use App\Traits\SaveToFolder;
use Livewire\WithFileUploads;
use App\Models\User;
use Session;
use Hash;

class ChangePassword extends Component
{
    use SaveToFolder,WithFileUploads;
    public $name;
    public $email;
    public $category;
    public $profile_photo_path;
    public $confirm_password;
    public $current_password;
    public $password;

    protected $listeners = ['ChangePassword' => '$refresh'];

    //validate category
    protected $rules = [
        'profile_photo_path'       => 'required',
        'confirm_password' => 'required|same:password',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'profile_photo_path.required' => 'Photo is required',
    ];

    public function render()
    {
        return view('livewire.account-settings.change-password',[
            'user_details' =>User::limit(1)->get()
        ]);
    }
    public function mount()
    {
        $this->fill([
            'name' => User::whereId(auth()->user()->id)->value('name'),
            'email' => User::whereId(auth()->user()->id)->value('email'),
            'category' => User::join('user_types','user_types.id','users.user_type')->where('users.id',auth()->user()->id)->value('category'),
            'profile_photo_path' => User::whereId(auth()->user()->id)->value('profile_photo_path'),
        ]);
    }
    public function submitPhoto(){
        $this->validate();
        $this->emit('ChangePassword', 'refreshComponent');
        User::addUserPhoto($this->saveItemToFolder('user_photos',$this->profile_photo_path));
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        Session::flash('msg', 'User Profile Photo added successful');
    }
    /* This function updates logged in user details
    */
    public function updatePassword()
    {
        $this->emit('ChangePassword', 'refreshComponent');

        User::where('id', auth()->user()->id)->update([
            'password' => Hash::make($this->password),
        ]);
        Session::flash('success', 'Successfully Updated an Account');
    }
}
