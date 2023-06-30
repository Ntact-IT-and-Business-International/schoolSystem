<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\WithPagination;
use App\Models\UserType;
use Modules\Permissions\Entities\Permission as Permision;

class Permission extends Component
{
    use WithPagination, WithSorting;

    protected $listeners = ['Permission' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'permissions.permission';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.permission',[
            'permissions' =>Permision::getPermissions($this->search, $this->sortBy, $this->sortDirection, $this->perPage),
            'user_types' =>UserType::whereId($this->user_type_id)->get()
        ]);
    }
    public function mount($user_type_id){
        $this->user_type_id = $user_type_id;
    }
}
