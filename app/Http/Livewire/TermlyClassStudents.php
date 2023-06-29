<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ReportCard\Entities\Result;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class TermlyClassStudents extends Component
{
    use WithPagination, WithSorting;
    
    //This refreshes this page automatically
    protected $listeners = ['TermlyClassStudents' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'students.last_name';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.termly-class-students',[
            'students'=>Result::getClassStudent($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
