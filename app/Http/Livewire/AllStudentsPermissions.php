<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Permissions\Entities\PermissionRequest;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class AllStudentsPermissions extends Component
{
    use WithPagination, WithSorting;
    
    //This refreshes this page automatically
    protected $listeners = ['AllStudentsPermissions' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'students.last_name';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.all-students-permissions',[
            'permissions_request'=>PermissionRequest::getPupilsPermissions($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
