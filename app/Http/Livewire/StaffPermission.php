<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Permissions\Entities\PermissionRequest;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class StaffPermission extends Component
{
    use WithPagination, WithSorting;
    
    //This refreshes this page automatically
    protected $listeners = ['StaffPermission' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'students.contact';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.staff-permission',[
            'permissions_request'=>PermissionRequest::getMyPupilsPermissions($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
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
