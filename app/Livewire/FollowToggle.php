<?php

namespace App\Livewire;

use App\Models\User;
use App\Notifications\ActivityNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FollowToggle extends Component
{
    public $user_id;

    public bool $isFollowing = false;

    public function mount($user_id)
    {
        $this->user_id = $user_id;
        $this->refreshState();
    }

    public function toggleFollow()
    {
        $tobenotified = User::find($this->user_id);
        $user = Auth::user();

        if ($this->isFollowing) {
            $user->following()->detach($this->user_id);
            if (Auth::id() != $tobenotified->id) {
            $tobenotified->notify(
                new ActivityNotification(
                    type: 'unfollow',
                    message: Auth::user()->name.' stopped following you',
                    actorId: Auth::id()
                ));
            }

        } else {
            $user->following()->attach($this->user_id);
            if (Auth::id() != $tobenotified->id) {
                $tobenotified->notify(
                    new ActivityNotification(
                        type: 'follow',
                        message: Auth::user()->name.' started following you',
                        actorId: Auth::id()
                    )
                );
            }

        }

        $this->refreshState();

        $this->dispatch('followUpdated');

    }

    private function refreshState()
    {
        $this->isFollowing = Auth::user()
            ->isFollowing($this->user_id);
    }

    public function render()
    {
        return view('livewire.follow-toggle');
    }
}
