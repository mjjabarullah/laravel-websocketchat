<?php

namespace App\Http\Livewire;

use App\Events\MessageDelete;
use App\Events\NewMessage;
use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class MainLobby extends Component
{
    use WithFileUploads;

    public string $input = "";
    public $image;
    public array $chatMessages = [];
    public User $user;
    public bool $showLoader = true;
    private int $limit = 15;
    public Room $room;

    protected $listeners = [
        'here',
        'subscribed',
        'newMessage',
        'newAudio',
        'removeMessage',
        'hideLoader',
        'load-more-messages' => 'loadMore',
        'scrolledBottom'
    ];

    public function mount(User $user, Room $room)
    {
        $this->user = $user;
        $this->room = $room;
    }

    public function render()
    {
        return view('livewire.main-lobby');
    }

    public function subscribed()
    {
        $this->chatMessages = $this->getMessages();
        $this->showLoader = false;
        $this->emit('hideLoader');
    }

    public function here()
    {
        $bot = User::where('is_bot', true)->first();
        $name = $this->user->name;
        $msg =
            "<span wire:click.prevent=\"onClickUserName('$name')\" @click='\$refs.input.focus()' class='bg-yellow-500 rounded-md text-white px-2 cursor-pointer'>$name</span> has joined {$this->user->room->name}. <span wire:click.prevent=\"welcomeUser('$name')\" class='cursor-pointer text-yellow-500'>Click here</span> to welcome .";
        $message = $bot->messages()->create([
            'room_id' => $this->room->id,
            'message' => $msg,
            'type' => 'system',
        ]);
        $topic = [
            'id' => -1,
            'message' => "$name, Welcome to {$this->user->room->name}. Click on the user's name, tag and continue your chat. ",
            'type' => 'topic',
        ];
        $this->broadcastToOthers($message);
        array_unshift($this->chatMessages, $topic);
    }

    public function sendMessage()
    {
        $input = strip_tags(htmlspecialchars_decode($this->input));
        if (trim($input) == "") {
            $this->dispatchBrowserEvent('chatError', [
                'title' => 'Message text cannot be empty'
            ]);
            return;
        }
        $message = $this->user->messages()->create([
            'room_id' => $this->room->id,
            'message' => $input,
            'type' => 'public',
        ]);
        $this->reset('input');
        $this->broadcastToOthers($message);
    }

    public function updatedImage()
    {
        try {
            $this->validate([
                'image' => 'image|max:1024'
            ]);
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('chatError', [
                'title' => 'Image should be less than 1 MB'
            ]);
            return;
        }
        $imageName = $this->image->store("main/images", 'public');
        $imageName = str_replace("main/images/", "", $imageName);
        $message = $this->user->messages()->create([
            'room_id' => $this->room->id,
            'message' => $this->input,
            'image' => $imageName,
            'type' => 'public',
        ]);
        $this->reset('input');
        $this->reset('image');
        $this->broadcastToOthers($message);
    }

    public function newAudio($audio){
        $audioName = Str::random(40). '.mp3';
        Storage::disk('public')->put("main/audios/$audioName", base64_decode(Str::of($audio)->after(',')));

        $message = $this->user->messages()->create([
            'room_id' => $this->room->id,
            'message' => $this->input,
            'audio' => $audioName,
            'type' => 'public',
        ]);
        $this->reset('input');
        $this->reset('image');
        $this->broadcastToOthers($message);
    }

    public function newMessage(Message $message)
    {
        if (count($this->chatMessages) >= $this->limit) {
            array_pop($this->chatMessages);
        }
        array_unshift($this->chatMessages, $message);
        $this->dispatchBrowserEvent('message-received');
    }

    public function loadMore(int $page)
    {
        $this->dispatchBrowserEvent('on-load-more-messages', ['loading' => true]);
        $moreMessages = $this->getMessages($page);
        if (count($moreMessages) == 0) {
            $this->dispatchBrowserEvent('no-more-messages', [
                'loading' => false,
                'available' => false,
                'message' => 'No more messages available.'
            ]);
            return;
        }
        foreach ($moreMessages as $message) {
            array_push($this->chatMessages, $message);
        }
        $this->dispatchBrowserEvent('on-load-more-messages', ['loading' => false, 'available' => true]);
    }

    public function scrolledBottom()
    {
        if (count($this->chatMessages) > $this->limit) {
            $this->chatMessages = array_slice($this->chatMessages, 0, $this->limit);
        }
    }

    public function deleteMessage($id)
    {
        $message = Message::find($id);
        if ($message == null) {
            $this->dispatchBrowserEvent('chatError', [
                'title' => 'Message already deleted'
            ]);
            return;
        }
        $this->chatMessages = array_filter($this->chatMessages, function ($value) use ($id) {
            return $value['id'] != $id;
        });
        broadcast(new MessageDelete($message->id, $message->room_id))->toOthers();
        $message->delete();
    }

    public function removeMessage($data)
    {
        $this->chatMessages = array_filter($this->chatMessages, function ($value) use ($data) {
            return $value['id'] != $data['id'];
        });
    }

    public function reportMessage(Message $message)
    {
//        $dm = 'reported ' . $message->id;
        dd($message);
    }

    public function welcomeUser($name)
    {
        $appName = env("APP_NAME");
        $randomMessage = [
            "Welcome to $appName $name",
            "$name welcome to $appName",
            "Welcome to $appName family $name"
        ];
        $message = $this->user->messages()->create([
            'room_id' => $this->room->id,
            'message' => $randomMessage[rand(0, count($randomMessage) - 1)],
            'type' => 'public',
        ]);
        $this->broadcastToOthers($message);
    }

    public function onClickUserName($name)
    {
        $this->input .= " $name ";
    }

    public function deleteTopic($id)
    {
        $this->chatMessages = array_filter($this->chatMessages, function ($value) use ($id) {
            return $value['id'] != $id;
        });
    }

    public function onChangeRoom(Room $room)
    {
        $this->room = $room;
        $this->showLoader = true;
        $this->emit('show-loader');
        $this->user->room_id = $this->room->id;
        $this->user->save();
        $this->dispatchBrowserEvent('roomChanged', ['roomId' => $this->room->id]);
    }

    public function hideLoader()
    {
        $this->showLoader = false;
    }

    private function broadcastToOthers($message)
    {
        if (count($this->chatMessages) >= $this->limit) {
            array_pop($this->chatMessages);
        }
        array_unshift($this->chatMessages, $message);
        $this->dispatchBrowserEvent('message-sent');
        broadcast(new NewMessage($message))->toOthers();
    }

    protected function getMessages($page = 0): array
    {
        return $this->room->messages()
            ->with('user')
            ->orderBy('id', 'desc')
            ->offset($page * $this->limit)
            ->take($this->limit)
            ->get()
            ->toArray();
    }
}
