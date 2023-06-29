<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Permissions\Entities\PermissionRequest;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class AllStaffPermissionsRequests extends Component
{
    use WithPagination, WithSorting;
    
    //This refreshes this page automatically
    protected $listeners = ['StaffPermission' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'permission_requests.staff_id';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.all-staff-permissions-requests',[
            'permissions_request'=>PermissionRequest::allStaffPermissions($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
    /**
     * This function approves teachersthe permission
     */
    public static function approvesTeachersPermission($permission_id)
    {
        PermissionRequest::whereId($permission_id)->update(['permission_status' => 'approved']);
        session()->flash('success', 'You have successfully approved Permission');
    }
}
