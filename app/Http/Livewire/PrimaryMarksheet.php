<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ReportCard\Entities\Result;
use Carbon\Carbon;
use DB;

class PrimaryMarksheet extends Component
{
    public $studentDetails;

    public function render()
    {
        return view('livewire.primary-marksheet',[
            'student_report_details'=>$this->getStudentDetails($this->class_id,$this->term)
        ]);
    }
    private function getStudentDetails($class_id,$term){
        return Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->select(
            'students.last_name',
            'students.first_name',
            'students.other_names',
            'results.student_id',
            DB::raw('SUM(examination_marks) as total_exam_marks'),
            'results.term'
        )
        ->where('results.class_id', $class_id)
        ->where('results.term', $term)
        ->whereYear('results.created_at', '=', Carbon::today()->year)
        ->distinct('students.last_name')
        ->groupBy('results.student_id', 'results.term','students.last_name','students.first_name','students.other_names')
        ->orderByDesc('total_exam_marks')
        ->get();
    }
    public function mount($class_id,$term){
        $this->class_id =$class_id;
        $this->term =$term;
        $this->studentDetails = $this->getStudentDetails($class_id, $term);
    }
}
