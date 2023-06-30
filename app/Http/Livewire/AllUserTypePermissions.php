<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\WithPagination;
use App\Models\UserType;
use Modules\Permissions\Entities\UserTypePermission;

class AllUserTypePermissions extends Component
{
    use WithPagination, WithSorting;

    protected $listeners = ['AllUserTypePermissions' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'permissions.permission';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.all-user-type-permissions',[
            'all_permissions' =>UserTypePermission::getUsertypePermissions($this->category_id,$this->search, $this->sortBy, $this->sortDirection, $this->perPage),
            'user_types' =>UserType::whereId($this->category_id)->get()
        ]);
    }
    public function mount($category_id){
        $this->category_id = $category_id;
    }
}
