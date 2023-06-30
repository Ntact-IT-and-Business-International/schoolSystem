<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Calendar extends Component
{
    public $month;
    public $year;
    public $events=[];

    public function render()
    {
        return view('livewire.calendar');
    }
    public function mount(){
        $this->month =date('m');
        $this->year =date('Y');
    }
    public function getEventsForDate($date){
        
    }
}
