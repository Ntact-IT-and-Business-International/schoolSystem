<?php

namespace App\Http\Livewire\AccountSettings;

use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\UserType;

class Category extends Component
{
    use WithPagination, WithSorting;

    protected $listeners = ['Category' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'category';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.account-settings.category',[
            'user_types' => UserType::getUserType($this->search, $this->sortBy, $this->sortDirection, $this->perPage),
        ]);
    }
}
