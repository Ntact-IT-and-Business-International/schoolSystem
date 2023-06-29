<?php

namespace App\Traits;

trait WithSorting
{
    public $sortDirection = 'desc';

    public $perPage = 10;

    public $search = '';

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortBy === $field
            ? $this->reverseSort()
            : 'asc';

        $this->sortBy = $field;
    }

    public function reverseSort()
    {
        return $this->sortDirection === 'asc'
            ? 'desc'
            : 'asc';
    }

    /**
     * this function resets the page after search
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
