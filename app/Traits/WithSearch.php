<?php

namespace App\Traits;

trait WithSearch
{
    public $search = '';

    public function search()
    {
        $search = '%'.$this->search.'%';
    }

    /**
     * this function resets the page after search
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
