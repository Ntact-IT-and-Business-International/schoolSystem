<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ReportCard\Entities\Result;
use App\Traits\WithSorting;
use Livewire\WithPagination;
use Carbon\Carbon;

class StudentReportCard extends Component
{
    use WithPagination, WithSorting;
    
    //This refreshes this page automatically
    protected $listeners = ['StaffPermission' => '$refresh'];
    

    //over ridding sortby from the trait
    public $sortBy = 'students.contact';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.student-report-card',[
            'student_report_cards'=>Result::getTermlyClassStudent($this->student_id,$this->term,$this->search, $this->sortBy, $this->sortDirection, $this->perPage),
            'student_report_details'=>$this->getStudentDetails($this->student_id,$this->term)
        ]);
    }
    private function getStudentDetails($student_id,$term){
        return Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->where('student_id',$student_id)
        ->where('results.term',$term)
        ->whereYear('results.created_at', '=', Carbon::today())
        ->limit(1)
        ->distinct('students.last_name')
        ->get(['students.last_name','students.first_name','students.other_names','students.fees_pay_code','results.student_id','classes.level',
                            'students.date_of_birth','students.gender','subjects.subject','results.*','students.photo']);
    }
    public function mount($student_id,$term){
        $this->student_id =$student_id;
        $this->term =$term;
    }
    private  function changeDivision($student_id){
        $total_aggregate =Result::where('student_id',$student_id)->whereYear('created_at', '=', Carbon::today())->sum('grade');
        if(Result::join('subjects','subjects.id','results.subject_id')->where('subjects.id', 1)->orwhere('subjects.id', 2)->where('results.grade',9) && ($total_aggregate >= 4 && $total_aggregate < 13) ){
            return II;
        }elseif (Result::join('subjects','subjects.id','results.subject_id')->where('subjects.id', 1)->orwhere('subjects.id', 2)->where('results.grade','!==',9) && ($total_aggregate >= 4 && $total_aggregate < 13) ){
            return I;
        // }elseif (Result::join('subjects','subjects.id','results.subject_id')->where('subjects.id', 1)->orwhere('subjects.id', 2)->where('results.grade',9) && ($total_aggregate > 12 && $total_aggregate < 25) ){
        //     return III;
    //    } elseif (Result::join('subjects','subjects.id','results.subject_id')->where('subjects.id', 1)->orwhere('subjects.id', 2)->where('results.grade','!==',9) && ($total_aggregate > 12 && $total_aggregate < 25) ){
    //         return II;
        
        }else{
            return X;
        }
    }
}
