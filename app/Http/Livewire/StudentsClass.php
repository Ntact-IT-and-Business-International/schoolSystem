<?php

namespace App\Http\Livewire;

use Modules\Students\Entities\Student;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;
use DB;

class StudentsClass extends Component
{
    use WithPagination, WithSorting;

    public $distinctYears;

    //This refreshes this page automatically
    protected $listeners = ['StudentsClass' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'classes.level';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.students-class',[
            'student_classes'=>Student::getClassStudent($this->search, $this->sortBy, $this->sortDirection, $this->perPage),
            'students' =>$this->studentsInAclass()
        ]);
    }
    public function mount(){
        $this->distinctYears =Student::query()->distinct()
        ->join('classes', 'classes.id', 'students.class_id')
        ->orderBy('students.created_at')
        ->pluck(\DB::raw('Year(students.class_id) as year'))
        ->toArray();
    }
    public function studentsInAclass(){
        return Student::join('classes', 'classes.id', 'students.class_id')->select(DB::raw('Distinct(class_id)'))
        ->groupBy('class_id')
        ->get();
    }
}
