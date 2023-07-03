<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Fees\Entities\Fee;

class ClearFeesForm extends Component
{
    public $payment_id;
    public $amount_paid;
    public $balance;

    protected $rules = [
        'amount_paid' => 'required',
        'balance' => 'required',
    ];

    public function render()
    {
        return view('livewire.clear-fees-form',[
            'clear_payments' => Fee::clearPayment($this->payment_id),
        ]);
    }
    public function mount($payment_id){
        $this->fill([
            'amount_paid' => Fee::clearPayment($this->payment_id)->value('amount_paid'),
            'balance' => Fee::clearPayment($this->payment_id)->value('balance'),
        ]);
    }
    public function clearPayment(){
        $this->validate();
        Fee::updatePayment($this->payment_id, $this->amount_paid, $this->balance);

        return redirect()->to('/fees/school-fees')->with('msg', 'Operation Successful');
    }
}
