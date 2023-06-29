<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ScholasticMaterials\Entities\ScholasticRequest;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class RequestedItems extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['RequestedItems' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'id';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.requested-items',[
            'items_requested' =>ScholasticRequest::getScholasticRequest($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
    /**
     * This function approves teachers items Request
     */
    public static function approvesTeachersRequests($permission_id)
    {
        PermissionRequest::whereId($permission_id)->update(['permission_status' => 'approved']);
        session()->flash('success', 'You have successfully approved Permission');
    }
}
