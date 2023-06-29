<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\WithPagination;
use App\Models\UserType;

class AllUsertypesForPermissions extends Component
{
    use WithPagination, WithSorting;

    protected $listeners = ['AllUsertypesForPermissions' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'category';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.all-usertypes-for-permissions',[
            'all_user_types' => UserType::getUserType($this->search, $this->sortBy, $this->sortDirection, $this->perPage),
        ]);
    }
}
