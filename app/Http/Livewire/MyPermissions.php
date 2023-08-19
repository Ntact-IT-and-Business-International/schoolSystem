<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Permissions\Entities\PermissionRequest;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class MyPermissions extends Component
{
    use WithPagination, WithSorting;
    
    //This refreshes this page automatically
    protected $listeners = ['MyPermissions' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'permission_requests.created_at';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.my-permissions',[
            'my_permissions'=>PermissionRequest::getMyPermissions($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
    /**
     * This function deletes the pupils permission
     */
    public static function deletePupilsPermision($permission_id){
        PermissionRequest::whereId($permission_id)->delete();
        session()->flash('success', 'Operation Successful');
    }
}
