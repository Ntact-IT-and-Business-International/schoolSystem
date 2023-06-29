<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ReportCard\Entities\PleResult;
use LivewireUI\Modal\ModalComponent;
use Session;
use App\Traits\SaveToFolder;
use Livewire\WithFileUploads;

class AddPLEResults extends ModalComponent
{
    use SaveToFolder,WithFileUploads;

    public $div1;
    public $div2;
    public $div3;
    public $div4;
    public $U;
    public $X;
    public $year;
    public $total;
    public $result;

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
        'result'      => 'required',
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
        'total.required'  => 'Total Numberof Students is required',
        'result.required' => 'Uploading Results is required',
    ];

    public function render()
    {
        return view('livewire.add-p-l-e-results');
    }
    /**
     * This function creates holiday Package
     */
    public function submit()
    {
        $this->validate();
        $this->emit('PLEResults', 'refreshComponent');
        /**
     * This function creates the ple results
     */
    PleResult::addPleResults($this->div1,$this->div2,$this->div3,$this->div4,$this->U,$this->X,$this->total,$this->year,$this->saveItemToFolder('Ple_Results', $this->result));
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Operation is successful');
    }
}
