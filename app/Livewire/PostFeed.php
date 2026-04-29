<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostFeed extends Component
{
    public $user = null;

    public $limit = 5;

    public $hasMore = true;

    public function mount($user = null)
    {
        $this->user = $user;
    }

    private function baseQuery()
    {
        $query = Post::with(['user', 'likes'])
            ->withCount('likes')
            ->latest();

        if ($this->user) {
            $query->where('user_id', $this->user->id);
        }

        return $query;
    }

    public function loadMore()
    {
        $this->limit += 10;

        $postsCount = $this->baseQuery()->count();

        if ($this->limit >= $postsCount) {
            $this->hasMore = false;
            $this->limit = $postsCount;
        }
    }

    public function like(Post $post)
    {
        $userId = Auth::id();

        if ($post->likes()->where('user_id', $userId)->exists()) {
            $post->likes()->detach($userId);
        } else {
            $post->likes()->attach($userId);
        }
    }

    public function render()
    {
        return view('livewire.post-feed', [
            'posts' => $this->baseQuery()
                ->take($this->limit)
                ->get(),
        ]);
    }
}
