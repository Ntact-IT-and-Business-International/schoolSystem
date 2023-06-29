<?php

namespace App\Http\Livewire;

use Modules\Subject\Entities\Subject;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class Subjects extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['Subjects' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'subject';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.subjects',[
            'subjects' =>Subject::getSubjects($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
