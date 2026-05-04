<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ProfileHeader extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    #[On(['followUpdated','postUpdated'])]
    public function refreshUser()
    {
        $this->user = User::withCount([
            'followers',
            'following',
            'posts',
        ])->find($this->user->id);
    }

    public function render()
    {
        return view('livewire.profile-header');
    }
}
