<?php

namespace App\Http\Livewire\AccountSettings;

use Livewire\Component;
use App\Models\UserType;
use LivewireUI\Modal\ModalComponent;
use Session;

class AddCategory extends ModalComponent
{
    public $category;

    //validate category
    protected $rules = [
        'category'         => 'required| unique:user_types',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'category.required' => 'Category is required',
    ];
    public function render()
    {
        return view('livewire.account-settings.add-category');

    }
    /**
     * This function creates category
    */
    public function submit()
    {
        $this->validate();
        $this->emit('Category', 'refreshComponent');
        UserType::createCategory($this->category);
        $this->closeModal();
        Session::flash('msg', 'Category creation is successful');
    } 
}
