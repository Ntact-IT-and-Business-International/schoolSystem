<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Students\Entities\Student;

class ViewMoreStudentsDetails extends Component
{
    public function render()
    {
        return view('livewire.view-more-students-details',[
            'students' =>Student::getMoreStudentInformation($this->student_id)
        ]);
    }
    public function mount($student_id)
    {
        $this->student_id = $student_id;
    }
}
