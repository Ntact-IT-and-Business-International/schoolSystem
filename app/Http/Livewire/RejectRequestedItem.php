<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\ScholasticMaterials\Entities\ScholasticRequest;

class RejectRequestedItem extends Component
{
    public $request_id;
    public $comment;
    public $replied_on;

    protected $rules = [
        'comment'        => 'required',
        'replied_on'     => '',
    ];

    public function render()
    {
        return view('livewire.reject-requested-item');
    }
    /**
     * This function updates User
     */
    public function rejectRequestedItem()
    {
        $this->validate();
        ScholasticRequest::rejectItemRequested($this->request_id, $this->comment);
        //activity()->log(auth()->user()->name.' Edited Accomodation Type called');

        return redirect()->to('/expenditure/requested-items-in-your-office')->with('msg', 'Item Requested has been Rejected');
    }
}
