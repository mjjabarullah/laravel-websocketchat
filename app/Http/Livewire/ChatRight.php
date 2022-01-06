<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatRight extends Component
{
    public bool $showLoader = true;

    protected function getListeners(): array
    {
        return [
            'hideLoader',
            'showLoader'
        ];
    }

    public function render()
    {
        return view('livewire.chat-right');
    }

    public function hideLoader()
    {
        $this->showLoader = false;
    }

    public function showLoader()
    {
        $this->showLoader = true;
    }
}
