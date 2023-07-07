<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ReportCard\Entities\Result;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class NurseryTermlyClasses extends Component
{
    use WithPagination, WithSorting;
    public $term_id;
    
    //This refreshes this page automatically
    protected $listeners = ['NurseryTermlyClasses' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'students.last_name';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.nursery-termly-classes',[
            'nursery_termly_classes'=>Result::getNurseryTermlyClasses($this->term_id,$this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
    public function mount($term_id){
        $this->term_id =$term_id;
    }
}
