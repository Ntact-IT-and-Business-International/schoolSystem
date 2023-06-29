<?php

namespace App\Http\Livewire;

use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\About\Entities\OurTeam;

class Team extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['Team' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'users.name';

    public function render()
    {
        return view('livewire.team',[
            'teams'=>OurTeam::getTeam($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
