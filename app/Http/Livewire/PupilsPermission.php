<?php

namespace App\Http\Livewire;

use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Permissions\Entities\PermissionRequest;

class PupilsPermission extends Component
{
    use WithPagination, WithSorting;
    protected $listeners = ['PupilsPermission' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'students.last_name';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.pupils-permission',[
            'permissions' =>PermissionRequest::getPupilsPermissions($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
