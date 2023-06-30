<?php

namespace App\Http\Livewire;
use Modules\Expenditure\Entities\Expenditure as Expenses;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class Expenditure extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['Expenditure' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'item';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.expenditure',[
            'expenditures' =>Expenses::getExpenditure($this->search, $this->sortBy, $this->sortDirection, $this->perPage),
            $this->getExpenditureThisWeek(),
            $this->getExpenditureThisMonth(), 
            $this->getExpenditureToday(),
            $this->getExpenditureThisTerm(),
            $this->getExpenditureTerm2(),
            $this->getExpenditureTerm3(),
            $this->getExpenditureThisYear(),
        ]);
    }
    /**
     * This function gets total amount collected today, this year
     */
    private function getExpenditureToday(){
        return Expenses::whereDate('created_at', Carbon::today())->sum('amount');
        
    }
    /**
     * This function gets total amount collected this week, this year
     */
    private function getExpenditureThisMonth(){
        return Expenses::whereMonth('created_at', date('m'))->sum('amount');
    }
    /**
     * This function gets total amount collected this week, this year
     */
    private function getExpenditureThisWeek(){
        return Expenses::whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->sum('amount');
    }
    /**
     * This function gets total amount collected this term, this year
     */
    private function getExpenditureThisTerm(){
        return Expenses::whereYear('created_at', date('Y'))->whereTerm(1)->sum('amount');
    }
    /**
     * This function gets total amount collected this term 2, this year
     */
    private function getExpenditureTerm2(){
        return Expenses::whereYear('created_at', date('Y'))->whereTerm(2)->sum('amount');
    }
    /**
     * This function gets total amount collected this term 3, this year
     */
    private function getExpenditureTerm3(){
        return Expenses::whereYear('created_at', date('Y'))->whereTerm(3)->sum('amount');
    }
    /**
     * This function gets total of all terma expenditure  this year
     */
    private function getExpenditureThisYear(){
        return $this->getExpenditureThisTerm()+$this->getExpenditureTerm2() + $this->getExpenditureTerm3();
    }
}
