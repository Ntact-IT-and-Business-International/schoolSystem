<?php

namespace App\Http\Livewire;

use Modules\Students\Entities\Student;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class ClassessPerYear extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['ClassessPerYear' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'students.created_at';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.classess-per-year',[
            'classes_per_year' =>Student::getClassesForYear($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
