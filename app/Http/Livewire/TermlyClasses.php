<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ReportCard\Entities\Result;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class TermlyClasses extends Component
{
    use WithPagination, WithSorting;
    
    public $term_id;
    
    //This refreshes this page automatically
    protected $listeners = ['TermlyClasses' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'students.last_name';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.termly-classes',[
            'termly_classes'=>Result::getTermlyClasses($this->term_id,$this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
    public function mount($term_id){
        $this->term_id =$term_id;
    }
}
