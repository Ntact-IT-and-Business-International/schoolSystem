<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\About\Entities\Faq as Faqs;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class Faq extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['Faq' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'heading';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.faq',[
            'faqs' =>Faqs::getFaq($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
