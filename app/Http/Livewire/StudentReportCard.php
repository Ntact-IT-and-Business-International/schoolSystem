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
            'student_report_cards'=>Result::getTermlyClassStudent($this->search, $this->sortBy, $this->sortDirection, $this->perPage),
            'student_report_details'=>$this->getStudentDetails()
        ]);
    }
    private function getStudentDetails(){
        return Result::join('users', 'users.id', 'results.user_id')
        ->join('students', 'students.id', 'results.student_id')
        ->join('classes', 'classes.id', 'results.class_id')
        ->join('subjects', 'subjects.id', 'results.subject_id')
        ->whereYear('results.created_at', '=', Carbon::today())
        ->limit(1)
        ->distinct('students.last_name')
        ->get(['students.last_name','students.first_name','students.other_names','results.student_id','classes.level','results.term',
                            'students.date_of_birth','students.gender','subjects.subject','results.*']);
    }
}
