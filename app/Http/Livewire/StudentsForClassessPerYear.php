<?php

namespace App\Http\Livewire;

use Modules\Students\Entities\Student;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class StudentsForClassessPerYear extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['StudentsForClassessPerYear' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'students.created_at';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.students-for-classess-per-year',[
            'students_for_particular_for_year' =>Student::getStudentsForClassesForYear($this->class_id,$this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
    public function mount($class_id)
    {
        $this->class_id = $class_id;
    }
}
