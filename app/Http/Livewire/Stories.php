<?php

namespace App\Http\Livewire;

use App\Models\Story;
use Illuminate\Support\Collection;
use Livewire\Component;

class Stories extends Component
{
    public Collection $stories;

    public function mount(){
        $this->stories = Story::all();
    }

    public function render()
    {
        return view('livewire.stories');
    }
}
