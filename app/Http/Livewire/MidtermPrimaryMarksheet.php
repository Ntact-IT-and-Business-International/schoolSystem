<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ReportCard\Entities\Result;
use Carbon\Carbon;

class MidtermPrimaryMarksheet extends Component
{
    public function render()
    {
        return view('livewire.midterm-primary-marksheet',[
            'student_report_details'=>$this->getStudentDetails($this->class_id,$this->term)
        ]);
    }
    private function getStudentDetails($class_id,$term){
        return Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->where('results.class_id',$class_id)
        ->where('results.term',$term)
        ->whereYear('results.created_at', '=', Carbon::today())
        ->distinct('students.last_name')
        ->get(['students.last_name','students.first_name','students.other_names','results.student_id','results.term']);
    }
    public function mount($class_id,$term){
        $this->class_id =$class_id;
        $this->term =$term;
    }
}
