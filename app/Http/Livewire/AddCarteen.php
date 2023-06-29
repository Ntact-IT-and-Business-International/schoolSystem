<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Modules\Carteen\Entities\Carteen;
use Modules\Students\Entities\Student;
use Session;

class AddCarteen extends ModalComponent
{
    public $student_id;
    public $item_bought;
    public $number;
    public $price;
    public $term;

    //validate category
    protected $rules = [
        'student_id'       => 'required',
        'term'            =>'required',
        'item_bought'      => 'required',
        'number'           => 'required',
        'price'            => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'item_bought.required' => 'Item  is required',
        'number.required' => 'Number  is required',
        'price.required' => 'Price  is required',
        'term'           =>'Term is equired',
    ];
    public function render()
    {
        return view('livewire.add-carteen',[
            'students'=>Student::get()
        ]);
    }
    /**
     * This function creates Carteen
     */
    public function submit()
    {
        $this->validate();
        $this->emit('Carten', 'refreshComponent');
        Carteen::addCarteenDailySpendings($this->student_id,$this->term,$this->item_bought,$this->number,$this->price);
        //activity()->log(auth()->user()->name.' Added a new Category called '.$this->category);
        $this->closeModal();
        Session::flash('msg', 'Operation is successful');
    }
}
