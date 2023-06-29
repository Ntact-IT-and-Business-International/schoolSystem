<?php

namespace App\Http\Livewire;

use Modules\Services\Entities\Event;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class Events extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['Events' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'title';

    public function render()
    {
        return view('livewire.events',[
            'events' =>Event::getEvent($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
