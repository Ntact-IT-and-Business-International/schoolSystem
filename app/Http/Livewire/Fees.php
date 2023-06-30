<?php

namespace App\Http\Livewire;
use Modules\Fees\Entities\Fee;

use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class Fees extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['Fees' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'students.last_name';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.fees',[
            'fees'=>Fee::getFees($this->search, $this->sortBy, $this->sortDirection, $this->perPage),
            $this->getFeesToday(),
            $this->getFeesThisMonth(),
            $this->getFeesThisWeek(),
            $this->getFeesTerm1(),
            $this->getFeesTerm2(),
            $this->getFeesTerm3(),
            $this->getFeesThisYear()
        ]);
    }
    /**
     * This function gets total amount collected today, this year
     */
    private function getFeesToday(){
        return Fee::whereDate('created_at', Carbon::today())->sum('amount_paid');
        
    }
    /**
     * This function gets total amount collected this month, this year
     */
    private function getFeesThisMonth(){
        return Fee::whereMonth('created_at', date('m'))->sum('amount_paid');
    }
    /**
     * This function gets total amount collected this week, this year
     */
    private function getFeesThisWeek(){
        return Fee::whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->sum('amount_paid');
    }
    /**
     * This function gets total amount collected this term, this year
     */
    private function getFeesTerm1(){
        return Fee::whereYear('created_at', date('Y'))->whereTerm(1)->sum('amount_paid');
    }
    /**
     * This function gets total amount collected this term 2, this year
     */
    private function getFeesTerm2(){
        return Fee::whereYear('created_at', date('Y'))->whereTerm(2)->sum('amount_paid');
    }
    /**
     * This function gets total amount collected this term 3, this year
     */
    private function getFeesTerm3(){
        return Fee::whereYear('created_at', date('Y'))->whereTerm(3)->sum('amount_paid');
    }
    /**
     * This function gets total of all terma expenditure  this year
     */
    private function getFeesThisYear(){
        return $this->getFeesTerm1()+$this->getFeesTerm2() + $this->getFeesTerm3();
    }
}
