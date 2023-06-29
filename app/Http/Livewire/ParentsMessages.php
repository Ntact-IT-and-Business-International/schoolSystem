<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Contact\Entities\Complains;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class ParentsMessages extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['ParentsMessages' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'students.last_name';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.parents-messages',[
            'complains'=>Complains::getComplain($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
