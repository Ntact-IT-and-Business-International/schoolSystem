<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ReportCard\Entities\Result;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class ReportCards extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['ReportCards' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'students.last_name';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public $pupils;

    public function render()
    {
        return view('livewire.report-cards',[
            'results' =>Result::getResult($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }

    public function mount()
    {    //$firstName.' '.$lastName;
        // Generate random total marks for 20 pupils (you can replace this with your actual data)
        $this->pupils = collect(range(1, 20))->map(function ($index) {
            return [ 
                'last_name' => 'Pupil ' . $index,
                'total_marks' => rand(100, 1000), // Generate random total marks
            ];
        });

        // Sort the pupils by total marks in descending order
        $this->pupils = $this->pupils->sortByDesc('total_marks')->values();

        // Calculate the positions
        $this->calculatePositions();
    }

    public function calculatePositions()
    {
        $position = 1;
        $this->pupils->each(function ($pupil) use (&$position) {
            $pupil['position'] = $position;
            $position++;
        });
    }
}
