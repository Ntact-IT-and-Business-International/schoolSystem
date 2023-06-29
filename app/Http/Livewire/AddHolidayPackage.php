<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ReportCard\Entities\HolidayPackage;
use LivewireUI\Modal\ModalComponent;
use Session;
use Modules\Class\Entities\Classes;
use Modules\Subject\Entities\Subject;
use App\Traits\SaveToFolder;
use Livewire\WithFileUploads;

class AddHolidayPackage extends ModalComponent
{
    use SaveToFolder,WithFileUploads;

    public $class_id;
    public $subject_id;
    public $term;
    public $package;
    public $user_id;

    //validate category
    protected $rules = [
        'class_id'          => 'required',
        'subject_id'        => 'required',
        'term'              => 'required',
        'package'           => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'class_id.required' => 'Item Name is required',
        'subject_id.required' => 'Subjectis required',
        'term.required'       => 'Term is required',
        'package.required' => 'Package is required',
    ];

    public function render()
    {
        return view('livewire.add-holiday-package',[
            'classes' =>Classes::get(),
            'subjects' =>Subject::get()
        ]);
    }
    /**
     * This function creates holiday Package
     */
    public function submit()
    {
        $this->validate();
        $this->emit('PackageForHolidays', 'refreshComponent');
        HolidayPackage::addHolidayPackage($this->class_id,$this->subject_id,$this->term,$this->saveItemToFolder('Holday_Package', $this->package));
        // HolidayPackage::create([
        //     'class_id'         => $class_id,
        //     'subject_id'       => $subject_id,
        //     'term'             => $term,
        //     'package'          => $this->saveItemToFolder('Holday_Package', $this->package), 
        //     'user_id'          =>auth()->user()->id,
        // ]);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Operation is successful');
    }
}
