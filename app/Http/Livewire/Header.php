<?php

namespace App\Http\Livewire;

use App\Models\Room;
use Livewire\Component;

class Header extends Component
{

    public Room $room;
    public bool $showMenu = false;

    protected $listeners =['roomChanged'];

    public function mount(Room $room){
       $this->room = $room;
    }

    public function render()
    {
        return view('livewire.header');
    }

    public function roomChanged(Room $room){
        $this->room = $room;
    }

    public function showMenu(){
        $this->showMenu = !$this->showMenu;
    }
}
