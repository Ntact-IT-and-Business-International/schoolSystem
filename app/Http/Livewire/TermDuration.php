<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\TermDuration\Entities\TermsDuration;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class TermDuration extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['TermDuration' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'term';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.term-duration',[
            'durations'=>TermsDuration::getTermDuration($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
