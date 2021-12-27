<?php

namespace App\Http\Livewire;

use App\Events\MessageDeleteEvent;
use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Messages extends Component
{

    public Collection $messages;
    private int $limit = 15;

    protected $listeners = [
        'echo:chat,MessageEvent' => 'onMessageReceived',
        'echo:chat,MessageDeleteEvent' => 'destroyMessage',
        'load-more-messages' => 'loadMoreMessages',
        'scrolled-bottom' => 'loadFirstPage'
    ];

    public function mount($messages)
    {
        $this->messages = $messages;
    }

    public function render()
    {
        return view('livewire.messages');
    }

    public function onMessageReceived(Message $message)
    {
        if (count($this->messages) >= 15) {
            $this->messages->pop();
        }
        $this->messages->prepend($message);
        $this->dispatchBrowserEvent('message-sent');
    }

    public function loadMoreMessages(int $page)
    {
        $this->dispatchBrowserEvent('on-load-more-messages', ['loading' => true]);
        $moreMessages = Message::orderBy('id', 'desc')->offset($page * $this->limit)->limit($this->limit)->get();
        if (count($moreMessages) == 0) {
            $this->dispatchBrowserEvent('no-more-messages', [
                'loading' => false,
                'available' => false,
                'message' => 'No more messages available.'
            ]);
            return;
        }
        foreach ($moreMessages as $message) {
            $this->messages->push($message);
        }
        $this->dispatchBrowserEvent('on-load-more-messages', ['loading' => false, 'available' => true]);
    }

    public function loadFirstPage()
    {
        $this->messages = Message::orderBy('id', 'desc')
            ->offset(0)->limit($this->limit)->get();
        $this->dispatchBrowserEvent('scrolled-bottom');
    }

    public function deleteMessage(Message $message)
    {
        $id = $message->id;
        broadcast(new MessageDeleteEvent($id));
        $message->delete();
    }

    public function destroyMessage($id)
    {
        $this->messages = $this->messages->filter(function ($value, $key) use ($id) {
            return $value->id != $id;
        });
    }

    public function reportMessage(Message $message){
        $dm = 'reported '. $message->id;
        dd($dm);
    }
}
