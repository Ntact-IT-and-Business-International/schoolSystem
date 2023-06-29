<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Portfolio\Entities\Portfolio;
use Session;
use App\Traits\SaveToFolder;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class AddPortfolio extends ModalComponent
{
    use SaveToFolder,WithFileUploads;

    public $category;
    public $title;
    public $date_of_activity;
    public $image;

    //validate portifolio
    protected $rules = [
        'category'          => 'required',
        'date_of_activity'  =>'required',
        'title'             => 'required',
        'image'             => 'required',
    ];

    /**
     * customizing the validation messages
     */
    protected $messages = [
        'category.required' => 'category is required',
        'date_of_activity.required' => 'Date of Activity is required',
        'title.required' => 'Title is required',
        'image.required' => 'Photo is required',
    ];

    public function render()
    {
        return view('livewire.add-portfolio');
    }
    /**
     * This function creates categorys
     */
    public function submit()
    {
        $this->validate();

        $this->emit('Portfolio', 'refreshComponent'); 
        Portfolio::addPortfolio($this->category,$this->title,$this->date_of_activity,$this->saveItemToFolder('portfolio_photos', $this->image));
        $this->closeModal();
        Session::flash('msg', 'Portfolio is successful created');
    }
}
