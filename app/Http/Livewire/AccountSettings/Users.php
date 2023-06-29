<?php

namespace App\Http\Livewire\AccountSettings;

use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class Users extends Component
{
    use WithPagination, WithSorting;

    protected $listeners = ['Users' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'users.id';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.account-settings.users',[
            'users' => User::getUsers($this->search, $this->sortBy, $this->sortDirection, $this->perPage),
        ]);
    }

    /**
     * This function deletes the users
     */
    public static function deleteShopItem($item_id)
    {
        Shop::whereId($item_id)->delete();
        session()->flash('success', 'Operation Successful');
    }
}
