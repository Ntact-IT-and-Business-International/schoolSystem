<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ReportCard\Entities\PleResult;

class EditPLEResults extends Component
{
    //validate category
    protected $rules = [
    'div1'        => 'required',
    'div2'        => 'required',
    'div3'        => 'required',
    'div4'        => 'required',
    'X'           => 'required',
    'U'           => 'required',
    'year'        => 'required',
    'total'       => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'div1.required'   => 'Div 1 Results is required',
        'div2.required'   => 'Div 2 Results is required',
        'div3.required'   => 'Div 3 Results is required',
        'div4.required'   => 'Div 4 Results is required',
        'X.required'      => 'X Results is required',
        'U.required'      => 'U Results is required',
        'year.required'   => 'Year of the Results is required',
        'total.required'  => 'Total Number of Students is required',
    ];

    public function render()
    {
        return view('livewire.edit-p-l-e-results',[
            'edit_results' =>PleResult::editPleResults($this->ple_results_id)
        ]);
    }
    /**
     * This function displays data to be edited
     */
    public function mount($ple_results_id)
    {
        $this->fill([
            'div1' => PleResult::editPleResults($this->ple_results_id)->value('div1'),
            'div2' => PleResult::editPleResults($this->ple_results_id)->value('div2'),
            'div3' => PleResult::editPleResults($this->ple_results_id)->value('div3'),
            'div4' => PleResult::editPleResults($this->ple_results_id)->value('div4'),
            'U' => PleResult::editPleResults($this->ple_results_id)->value('U'),
            'X' => PleResult::editPleResults($this->ple_results_id)->value('X'),
            'total' => PleResult::editPleResults($this->ple_results_id)->value('total'),
            'year' => PleResult::editPleResults($this->ple_results_id)->value('year'),
        ]);
    }

    /**
     * This function updates ple results
     */
    public function updatePleResults()
    {
        $this->validate();
        PleResult::updatePleResultsInfo($this->ple_results_id,$this->div1,$this->div2,$this->div3,$this->div4,$this->U,$this->X,$this->total,$this->year);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to(url()->previous())->with('msg', 'Your PLE Results has been edited successfully');
    }
}
