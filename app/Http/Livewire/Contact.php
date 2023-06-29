<?php

namespace App\Http\Livewire;

use Modules\Contact\Entities\Message;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class Contact extends Component
{
    use WithPagination, WithSorting;
    protected $listeners = ['Contact' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'names';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.contact',[
            'messages' =>Message::getMessage($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
