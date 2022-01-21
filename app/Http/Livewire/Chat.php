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

    protected $listeners = [
        'socket'=> 'socketId'
    ];

    public function mount(User $user, Room $room)
    {
        $this->user = $user;
        $this->room = $room;
    }

    public function render()
    {
        return view('livewire.chat');
    }

    public function socketId(String $socketId){
        $this->user->connections()->create([
            'socket_id' => $socketId
        ]);
    }
}
