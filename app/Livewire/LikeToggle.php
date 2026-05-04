<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use App\Notifications\ActivityNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikeToggle extends Component
{
    public Post $post;

    public bool $isLiked = false;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->refreshLikeState();
    }

    public function toggleLike()
    {
        $userId = Auth::id();
        $tobenotified = User::find($this->post->user_id);

        if ($this->post->likes()->where('user_id', $userId)->exists()) {
            $this->post->likes()->detach($userId);
            $this->isLiked = false;

            if (Auth::id() != $tobenotified->id) {
                $tobenotified->notify(
                    new ActivityNotification(
                        type: 'unlike',
                        message: Auth::user()->name.' unliked your post',
                        actorId: Auth::id()

                    )
                );
            }
        } else {
            $this->post->likes()->attach($userId);
            $this->isLiked = true;
            if (Auth::id() != $tobenotified->id) {
                $tobenotified->notify(
                    new ActivityNotification(
                        type: 'like',
                        message: Auth::user()->name.' liked your post',
                        actorId: Auth::id()

                    )
                );
            }
        }

        $this->dispatch('likeUpdated');
    }

    private function refreshLikeState()
    {
        $this->isLiked = $this->post
            ->likes()
            ->where('user_id', Auth::id())
            ->exists();
    }

    public function render()
    {
        return view('livewire.like-toggle');
    }
}
