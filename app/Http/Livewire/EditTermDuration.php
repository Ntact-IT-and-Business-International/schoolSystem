<?php

namespace App\Http\Livewire;
use Modules\TermDuration\Entities\TermsDuration;

use Livewire\Component;

class EditTermDuration extends Component
{
    public $term_duration_id;
    public $start_date;
    public $end_date;
    public $term;

    protected $rules = [
        'start_date' => 'required',
        'end_date'   => 'required',
        'term'      => 'required',
    ];

    public function render()
    {
        return view('livewire.edit-term-duration');
    }
    public function mount($term_duration_id){
        $this->fill([
            'start_date'=>TermsDuration::editTermDuration($this->term_duration_id)->value('start_date'),
            'end_date'=>TermsDuration::editTermDuration($this->term_duration_id)->value('end_date'),
            'term'=>TermsDuration::editTermDuration($this->term_duration_id)->value('term'),
        ]);
    }
     /**
     * This function updates term Duration
     */
    public function updateTermDuration()
    {
        $this->validate();
        TermsDuration::updateTermDuration($this->term_duration_id,$this->term,$this->start_date,$this->end_date);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to('/termduration/term-duration')->with('msg', 'Your Term Duration info has been edited successfully');
    }
}
