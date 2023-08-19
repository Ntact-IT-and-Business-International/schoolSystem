<?php

namespace App\Http\Livewire;

use Modules\Class\Entities\Classes as Classs;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class Classes extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['Classes' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'level';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.classes',[
            'classes' =>Classs::getClasses($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
    /**
     * This function deletes the class
     */
    public static function deleteClass($class_id){
        Classs::whereId($class_id)->delete();
        session()->flash('success', 'Operation Successful');
    }
}
