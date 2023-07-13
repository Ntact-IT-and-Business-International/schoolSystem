<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Students\Entities\Student;
use App\Models\User;
use Session;
use App\Traits\SaveToFolder;
use Livewire\WithFileUploads;

class UploadStudentPhoto extends Component
{
    use SaveToFolder,WithFileUploads;
    public $photo;
    public $student_id;
    //validate student photo
    protected $rules = [
        'photo' => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'photo.required' => 'Photo is required',
    ];
    public function render()
    {
        return view('livewire.upload-student-photo');
    }
    public function mount($student_id){
        $this->student_id =$student_id;
    }
    /**
     * This function updates subject
     */
    public function uploadPhotoNow()
    {
        $this->validate();
        Student::updateStudentPhoto($this->student_id,$this->saveItemToFolder('Student_photos', $this->photo));
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->back()->with('msg', 'Student info has been edited successfully');
    }
    
}
