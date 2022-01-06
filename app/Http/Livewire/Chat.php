<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{
    public User $user;
    public Room $room;

    public function mount(User $user, Room $room)
    {
        $this->user = $user;
        $this->room = $room;
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
