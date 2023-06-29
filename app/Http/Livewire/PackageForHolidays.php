<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ReportCard\Entities\HolidayPackage;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class PackageForHolidays extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['PackageForHolidays' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'holiday_packages.package';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.package-for-holidays',[
            'holiday_packages' =>HolidayPackage::getHolidayPackage($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
