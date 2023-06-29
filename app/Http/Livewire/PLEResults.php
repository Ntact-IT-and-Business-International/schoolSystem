<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ReportCard\Entities\PleResult;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class PLEResults extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['PLEResults' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'ple_results.id';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.p-l-e-results',[
            'ple_results' =>PleResult::getPleResults($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
