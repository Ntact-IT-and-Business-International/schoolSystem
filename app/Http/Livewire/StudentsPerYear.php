<?php

namespace App\Http\Livewire;

use Modules\Students\Entities\Student;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class StudentsPerYear extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['StudentsPerYear' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'students.created_at';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public $distinctYears =[];
    public $class_id;

    public function render()
    {
        return view('livewire.students-per-year',[
            'student_by_year'=>$this->getYears()
        ]);
    }
    /**
     * This function gets the last five year upto the current year
     */
    private function getYears(){
        return Student::distinct()->join('users', 'users.id', 'students.user_id')
        ->join('classes', 'classes.id', 'students.class_id')
        ->whereYear('students.created_at', '>=',now()->subYears(5)->format('Y'))
        ->distinct('students.created_at')
        ->get( ['students.*']); 
    }
    public function mount(){
            $this->distinctYears =Student::query()->distinct()
            ->join('classes', 'classes.id', 'students.class_id')
            ->orderBy('students.created_at')
            ->pluck(\DB::raw('Year(students.created_at) as year'))
            ->toArray();

            //$this->$class_id =class_id;

            //$this->class_id = $class_id;
    }
}
