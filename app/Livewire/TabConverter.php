<?php

namespace App\Livewire;

use Livewire\Component;

class TabConverter extends Component
{
    public $activeTab = 'posts';

    public $user;

    protected $listeners = ['likeUpdated' => '$refresh'];

    public function mount($user)
    {
        $this->user = $user;
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.tab-converter');
    }
}
