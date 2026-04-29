<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ProfilePage extends Component
{
    public User $user;

    public string $tab = 'posts'; 

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function setTab($tab)
    {
        $this->tab = $tab;
        
    }

    public function render()
    {
        return view('livewire.profile-page');
    }
}
