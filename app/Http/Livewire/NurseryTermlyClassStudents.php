<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ReportCard\Entities\Result;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class NurseryTermlyClassStudents extends Component
{
    use WithPagination, WithSorting;
    
    public $class_id;
    //This refreshes this page automatically
    protected $listeners = ['NurseryTermlyClassStudents' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'students.last_name';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.nursery-termly-class-students',[
            'nursery_students'=>Result::getClassStudent($this->class_id,$this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
    public function mount($class_id){
        $this->class_id =$class_id;
    }
}
