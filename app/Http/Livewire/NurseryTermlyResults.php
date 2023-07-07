<?php

namespace App\Http\Livewire;
use Modules\ReportCard\Entities\Result;
use App\Traits\WithSorting;
use Livewire\WithPagination;

use Livewire\Component;

class NurseryTermlyResults extends Component
{
    use WithPagination, WithSorting;
    
    //This refreshes this page automatically
    protected $listeners = ['NurseryTermlyResults' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'students.last_name';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.nursery-termly-results',[
            'nursery_termly_results'=>Result::getNurseryTermlyResult($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
