<?php

namespace App\Http\Livewire;

use App\Events\MessageEvent;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Ramsey\Uuid\Uuid;

class MainLobby extends Component
{

    use WithFileUploads;

    public string $input = "";
    public $image;

    public function render()
    {
        return view('livewire.main-lobby', [
            'messages' => Message::orderBy('id', 'desc')->take(15)->get()
        ]);
    }

    public function sendMessage()
    {
        if (trim($this->input) == "") {
            $this->dispatchBrowserEvent('empty-input', [
                'title' => 'Message text cannot be empty'
            ]);
            return;
        }
//        if (!Auth::check()) {
//            $this->dispatchBrowserEvent('empty-input', [
//                'title' => 'you are not a logged in user'
//            ]);
//            return;
//        }
        $message = Message::create([
            'message' => $this->input
        ]);
        broadcast(new MessageEvent($message));
        $this->input = "";

    }

    public function uploadImage()
    {
        $this->image->store('images', 'public');
    }

}
