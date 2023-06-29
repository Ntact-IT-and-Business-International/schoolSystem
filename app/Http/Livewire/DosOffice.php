<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Store\Entities\DosOffice as Office;
use Modules\ScholasticMaterials\Entities\Scholastic;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class DosOffice extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['DosOffice' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'scholastics.item_name';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dos-office',[
            'doss'=>Office::getDosOfficeItems($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
