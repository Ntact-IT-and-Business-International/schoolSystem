<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Store\Entities\Store;
use Modules\ScholasticMaterials\Entities\Scholastic;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class Food extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['Food' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'scholastics.item_name';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.food',[
            'foods'=>Store::getStore($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
