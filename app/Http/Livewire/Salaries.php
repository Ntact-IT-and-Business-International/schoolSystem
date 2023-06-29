<?php

namespace App\Http\Livewire;

use Modules\Expenditure\Entities\Salary;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class Salaries extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['Salaries' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'staffs.staff_last_name';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.salaries',[
            'salaries' =>Salary::getSalary($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
