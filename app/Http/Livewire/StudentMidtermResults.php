<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ReportCard\Entities\Result;
use App\Traits\WithSorting;
use Livewire\WithPagination;
use Carbon\Carbon;
use Modules\ReportCard\Entities\MidtermComment;

class StudentMidtermResults extends Component
{
    use WithPagination, WithSorting;
    
    //This refreshes this page automatically
    protected $listeners = ['StudentMidtermResults' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'results.id';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.student-midterm-results',[
            'student_report_cards'=>Result::getTermlyClassStudent($this->student_id,$this->term,$this->search, $this->sortBy, $this->sortDirection, $this->perPage),
            'student_report_details'=>$this->getStudentDetails($this->student_id,$this->term),
            'students_comments' =>$this->getComments($this->student_id,$this->term),
            'number_of_students' =>$this->countPupils($this->term),
            'classteacher_signature' =>$this->getsClassteachesrName($this->student_id,$this->term),
            'headteacher_signature' =>$this->getsHeadteachesrName($this->student_id,$this->term)
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
        ->get(['students.last_name','students.first_name','students.other_names','results.student_id','classes.level','results.term',
                            'students.date_of_birth','students.gender','subjects.subject','results.*','students.photo']);
    }
    public function mount($student_id,$term){
        $this->student_id =$student_id;
        $this->term =$term;
    }
     /**
     * This function gets all students comments
     */
    private function getComments($student_id,$term){
        return MidtermComment::join('results', 'results.id', 'midterm_comments.student_id')->where('midterm_comments.student_id',$student_id)
        ->where('midterm_comments.term',$term)->get(['midterm_comments.*']);
      }
      /**
       * This function counts the number of pupils in particular class,year
       */
      public function countPupils($term){
          return Result::whereTerm($term)->whereYear('created_at', '=', Carbon::today())->distinct('student_id')->count();
      } 
      /**
       * This function get class teachers name 
       */
      public function getsClassteachesrName($student_id,$term){
          return MidtermComment::join('users','users.id','midterm_comments.teacher_id')->where('midterm_comments.term',$term)->where('midterm_comments.student_id',$student_id)->value('users.name');
      }
      /**
       * This function get head teachers name 
       */
      public function getsHeadteachesrName($student_id,$term){
          return MidtermComment::join('users','users.id','midterm_comments.headteacher_id')->where('midterm_comments.term',$term)->where('midterm_comments.term',$term)->where('midterm_comments.student_id',$student_id)->value('users.name');
      }
}
