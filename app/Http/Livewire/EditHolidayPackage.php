<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ReportCard\Entities\HolidayPackage;
use Modules\Class\Entities\Classes;
use Modules\Subject\Entities\Subject;

class EditHolidayPackage extends Component
{
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
        return view('livewire.edit-holiday-package',[
            'edit_holiday_package' =>HolidayPackage::editHolidayPackage($this->holiday_package_id),
            'classes' =>Classes::get(),
            'subjects' =>Subject::get()
        ]);
    }
    /**
     * This function displays data to be edited
     */
    public function mount($holiday_package_id)
    {
        $this->fill([
            'class_id' => HolidayPackage::editHolidayPackage($this->holiday_package_id)->value('class_id'),
            'subject_id' => HolidayPackage::editHolidayPackage($this->holiday_package_id)->value('subject_id'),
            'term' => HolidayPackage::editHolidayPackage($this->holiday_package_id)->value('term'),
            'package' => HolidayPackage::editHolidayPackage($this->holiday_package_id)->value('package'),
        ]);
    }

    /**
     * This function updates holiday package
     */
    public function updateRequestedItems()
    {
        $this->validate();
        HolidayPackage::updateHolidayPackageInfo($this->holiday_package_id,$this->class_id,$this->subject_id,$this->term,$this->package);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to(url()->previous())->with('msg', 'Your Holiday Package has been edited successfully');
    }
}
