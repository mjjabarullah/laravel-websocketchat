<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserList extends Component
{

    public $users = [];

    protected $listeners = [
        'here',
        'joining',
        'leaving'
    ];

    public function render()
    {
        return view('livewire.user-list');
    }

    public function here($users)
    {
        $this->users = $users;
    }

    public function joining($user)
    {
        array_push($this->users, $user);
        $this->users = array_unique($this->users, SORT_REGULAR);
    }

    public function leaving($user)
    {
        $this->users = array_filter($this->users, function ($value) use ($user) {
            return ($value['id'] != $user['id']);
        });
    }
}
