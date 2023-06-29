<?php

namespace App\Http\Livewire;
use Modules\Portfolio\Entities\Portfolio as Blog;

use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class Portfolio extends Component
{
    use WithPagination, WithSorting;
    protected $listeners = ['Portfolio' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'title';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.portfolio',[
            'blogs' =>Blog::getPortfolio($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
