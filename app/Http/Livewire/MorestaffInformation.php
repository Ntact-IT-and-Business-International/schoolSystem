<?php

namespace App\Http\Livewire;
use Modules\Staff\Entities\Staffs;

use Livewire\Component;

class MorestaffInformation extends Component
{
    public function render()
    {
        return view('livewire.morestaff-information',[
            'more_staff_information' =>Staffs::getStaffMoreInformation($this->staff_id)
        ]);
    }
    public function mount($staff_id){
        $this->staff_id =$staff_id;
    }
}
