<?php

namespace App\Http\Livewire;

use App\Models\Room;
use App\Models\User;
use Livewire\Component;

class ChatLeft extends Component
{
    public User $user;
    public Room $room;

    protected $listeners =['roomChanged'];

    public function mount(User $user, Room $room){
       $this->user = $user;
       $this->room = $room;
    }

    public function render()
    {
        return view('livewire.chat-left');
    }

    public function roomChanged(Room $room){
        $this->room = $room;
    }
}
