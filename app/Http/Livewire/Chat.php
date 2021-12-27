<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class Chat extends Component
{
    public function render()
    {
        return view('livewire.chat',[
            'messages' => Message::orderBy('id', 'desc')->take(15)->get()
        ]);
    }
}
