<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Subject\Entities\Subject;
use Session;

class EditSubject extends Component
{
    public $subject;
    public $subject_id;

    protected $rules = [
        'subject' => 'required:unique:classes',
    ];

    public function render()
    {
        return view('livewire.edit-subject',[
            'edit_subject' => Subject::editSubject($this->subject_id),
        ]);
    }
    /**
     * This function displays data to be edited
     */
    public function mount($subject_id)
    {
        $this->fill([
            'subject' => Subject::editSubject($this->subject_id)->value('subject'),
        ]);
    }

    /**
     * This function updates subject
     */
    public function updateSubject()
    {
        $this->validate();
        Subject::updateSubject($this->subject_id, $this->subject);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to(url()->previous())->with('msg', 'Your Subject info has been edited successfully');
    }
}
