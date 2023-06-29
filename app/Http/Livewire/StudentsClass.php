<?php

namespace App\Http\Livewire;

use Modules\Students\Entities\Student;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class StudentsClass extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['StudentsClass' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'classes.level';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.students-class',[
            'student_classes'=>Student::getClassStudent($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
