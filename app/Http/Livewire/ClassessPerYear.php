<?php

namespace App\Http\Livewire;

use Modules\Students\Entities\Student;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;
use DB;

class ClassessPerYear extends Component
{
    use WithPagination, WithSorting;
    public $class_id;
    public $year_id;
    public $distinctData;

    //This refreshes this page automatically
    protected $listeners = ['ClassessPerYear' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'students.created_at';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.classess-per-year',[
            'classes_per_year' =>Student::getClassesForYear($this->year_id,$this->search, $this->sortBy, $this->sortDirection, $this->perPage)
            // 'classes_per_year' =>$this->getAllClassYears($this->year_id)
        ]);
    }
    public function mount($year_id)
    {
        $this->year_id = $year_id;
        $this->distinctData=Student::join('classes', 'classes.id', 'students.class_id')->distinct('students.class_id')->get('students.class_id','clsses.level');
    }
    
}
