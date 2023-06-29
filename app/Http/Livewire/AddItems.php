<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Expenditure\Entities\Item;
use LivewireUI\Modal\ModalComponent;
use Session;

class AddItems extends ModalComponent
{
    public function render()
    {
        return view('livewire.add-items');
    }
}
