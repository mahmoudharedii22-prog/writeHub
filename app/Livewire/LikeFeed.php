<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikeFeed extends Component
{
    public $user = null;

    public $limit = 10;

    public $hasMore = true;

    public $max;

    public function mount($user = null)
    {
        $this->user = $user;
        $max = $this->user->loadCount(['likedPosts']);

    }

    public function loadMore()
    {
        if ($this->limit >= $this->max) {
            $this->hasMore = false;
            $this->limit = $this->max;
        } else {
            $this->limit += 10;
        }

    }

    private function baseQuery()
    {
        $user = $this->user ?? Auth::user();

        $query = $user->likedPosts()
            ->with(['user', 'likes'])
            ->withCount('likes')
            ->latest();

        return $query;
    }

    public function render()
    {
        $likedPosts = $this->baseQuery()->take($this->limit)->get();

        return view('livewire.like-feed', compact('likedPosts'));
    }
}
