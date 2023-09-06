<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use Modules\Students\Entities\Student;
use App\Models\User;
use Session;
use App\Traits\SaveToFolder;
use Livewire\WithFileUploads;
use Modules\Class\Entities\Classes;
use Hash;

class AddStudent extends ModalComponent
{
    use SaveToFolder,WithFileUploads;

    public $class_id;
    public $first_name;
    public $last_name;
    public $other_names;
    public $date_of_birth;
    public $gender;
    public $special_need;
    public $parents_name;
    public $contact;
    public $nin;
    public $location;
    public $section;
    public $photo;
    public $name;
    public $email;
    public $password;
    public $user_type;
    public $fees_pay_code;
    public $user_id;
    public $confirm_password;
    public $profile_photo_path;

    //validate category
    protected $rules = [
        'class_id'       => 'required',
        'first_name'     => 'required',
        'last_name'      => 'required',
        'other_names'    => '',
        'date_of_birth'  => 'required',
        'gender'         => 'required',
        'special_need'   => '',
        'parents_name'   => 'required',
        'contact'        => 'required',
        'nin'            => 'required',
        'location'       => 'required',
        'fees_pay_code'  =>'',
        'section'        => 'required',
        'photo'          => 'required',
        'name'           => '',
        'email'          => '',
        'password'       => 'required',
        'user_type'      => '',
        'confirm_password' => 'required|same:password',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'class_id.required' => 'Class is required',
        'first_name.required' => 'FirstName is required',
        'last_name.required' => 'Lastname is required',
        'date_of_birth.required' => 'Date of birth is required',
        'gender.required' => 'Gender is required',
        'parents_name.required' => 'Parent Name is required',
        'contact.required' => 'Parents Contact is required',
        'nin.required' => 'Parent Nin is required',
        'location.required' => 'Student Location is required',
        'section.required' => 'Section is required',
        'photo.required' => 'Student Photo is required',
        'password.required' => 'Password is required',
    ];

    public function render()
    {
        return view('livewire.add-student',[
            'classes' =>Classes::get(),
        ]);
    }
    /**
     * This function creates Student
     */
    public function submit()
    {
        $this->validate();

        $this->emit('StudentsClass', 'refreshComponent'); 
        $this->createAccount($this->name, $this->email, $this->user_type,$this->password,'Student_photos/'.$this->profile_photo_path);
        Student::addStudent($this->first_name,$this->last_name,$this->other_names,$this->class_id,$this->date_of_birth,$this->gender,$this->special_need,$this->parents_name,$this->contact,$this->nin,$this->location,$this->section,$this->fees_pay_code,$this->saveItemToFolder('Student_photos', $this->photo));
        $this->closeModal();
        Session::flash('msg', 'Client is successful created');
    }
    /**
     * this function creates a user
     */
    private function createAccount($name, $email, $user_type,$password,$profile_photo_path)
    {
        
        $names = $this->first_name.' '.$this->last_name.' '.$this->other_names; 
        User::create([
            'name' => $names,
            'email' => $this->contact,
            'user_type' => '1',
            'profile_photo_path'=>$this->photo,
            'password' => Hash::make($password),
        ]);
    }
}
