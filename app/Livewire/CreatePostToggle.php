<?php

namespace App\Livewire;

use Livewire\Component;

class CreatePostToggle extends Component
{
    public $open = false;

    protected $listeners = ['postCreated' => 'toggle'];

    public function toggle()
    {
        $this->open = ! $this->open;

        $this->dispatch('postFormToggled', $this->open);
    }

    public function render()
    {
        return view('livewire.create-post-toggle');
    }
}
