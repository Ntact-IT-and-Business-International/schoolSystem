<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ScholasticMaterials\Entities\Scholastic;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class ScholasticMaterials extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['ScholasticMaterials' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'scholastics.item_name';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.scholastic-materials',[
            'materials' =>Scholastic::getScholastic($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
