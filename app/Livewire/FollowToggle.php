<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FollowToggle extends Component
{
    public $user_id;

    public function mount($user_id)
    {
        $this->user_id = $user_id;
    }

    public function render()
    {
        return view('livewire.follow-toggle');
    }

    public function toggleFollow()
    {
        if (Auth::user()->isFollowing($this->user_id)) {
            Auth::user()->followings()->detach($this->user_id);
        } else {
            Auth::user()->followings()->attach($this->user_id);
        }
    }
}
