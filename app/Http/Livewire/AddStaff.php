<?php

namespace App\Http\Livewire;

use Modules\Staff\Entities\Staffs;
use LivewireUI\Modal\ModalComponent;
use App\Models\User;
use Session;
use App\Traits\SaveToFolder;
use Livewire\WithFileUploads;
use Modules\Class\Entities\Classes;
use Modules\Subject\Entities\Subject;
use Hash;
use App\Models\UserType;

class AddStaff extends ModalComponent
{
    use SaveToFolder,WithFileUploads;

    public $staff_first_name;
    public $staff_last_name;
    public $staff_other_names;
    public $class_id;
    public $date_of_birth;
    public $gender;
    public $phone_number;
    public $staff_email;
    public $nin;
    public $location;
    public $qualification;
    public $subject_id;
    public $registration_number;
    public $title;
    public $documents;
    public $salary;
    public $photo;
    public $name;
    public $email;
    public $password;
    public $user_type;
    public $user_id;
    public $confirm_password;
    public $profile_photo_path;

    //validate category
    protected $rules = [
        'class_id'             => '',
        'staff_first_name'     => 'required',
        'staff_last_name'      => 'required',
        'staff_other_names'    => '',
        'date_of_birth'        => 'required',
        'gender'               => 'required',
        'phone_number'         => 'required|unique:staffs',
        'staff_email'          => '',
        'nin'                  => 'required',
        'qualification'        => 'required',
        'subject_id'           =>'',
        'registration_number'  =>'',
        'title'                =>'required',
        'documents'            =>'',
        'salary'               =>'required',
        'photo'                => 'required',
        'name'                 => '',
        'email'                => '',
        'password'             => 'required',
        'user_type'            => '',
        'confirm_password'     => 'required|same:password',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'class_id.required' => 'Class is required',
        'staff_first_name.required' => 'FirstName is required',
        'staff_last_name.required' => 'Lastname is required',
        'date_of_birth.required' => 'Date of birth is required',
        'gender.required' => 'Gender is required',
        'phone_number.required' => 'Staff Phone number is required',
        'nin.required' => 'Parent Nin is required',
        'qualification.required' => 'Qualification is required',
        'title.required' => 'Title is required',
        'salary.required' => 'Salary is required',
        'photo.required' => 'Student Photo is required',
        'password.required' => 'Password is required',
    ];

    public function render()
    {
        return view('livewire.add-staff',[
            'subjects'=>Subject::get(),
            'classes'=>Classes::get(),
            'categories'=>UserType::get(),
        ]);
    }
    /**
     * This function creates staff
     */
    public function submit()
    {
        $this->validate();

        $this->emit('Staff', 'refreshComponent');
        
        $this->createAccount($this->name, $this->email, $this->user_type,$this->password,'Staff_photos/'.$this->profile_photo_path);

        Staffs::addStaff($this->staff_first_name,$this->staff_last_name,$this->staff_other_names,$this->class_id,
        $this->date_of_birth,$this->gender,$this->phone_number,$this->staff_email,$this->nin,$this->registration_number,$this->qualification,
        $this->subject_id,$this->registration_number,$this->title,$this->saveItemToFolder('Staff_document', $this->documents),$this->salary,$this->saveItemToFolder('Staff_photos', $this->photo));
        $this->closeModal();
        Session::flash('msg', 'Staff is successful created');
    }
    /**
     * this function creates a user
     */
    private function createAccount($name, $email, $user_type,$password,$profile_photo_path)
    {
        $names = $this->staff_first_name.' '.$this->staff_last_name.' '.$this->staff_other_names;
        User::create([
            'name' => $names,
            'email' => $this->phone_number,
            'user_type' => $user_type,
            'profile_photo_path'=>$this->photo,
            'password' => Hash::make($password),
        ]);
    }
}
