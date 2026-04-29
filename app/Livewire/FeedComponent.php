<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class FeedComponent extends Component
{
    public $query = null;

    public $user = null;

    public $limit = 5;

    public $hasMore = true;

    public function mount($user = null, $query = null)
    {
        $this->user = $user;
        $this->query = $query;
    }

    private function baseQuery()
    {
        return Post::with(['user', 'likes'])
            ->withCount('likes')
            ->latest()
            ->when($this->user, fn ($q) => $q->where('user_id', $this->user->id))
            ->when($this->query, function ($q) {
                $q->where('content', 'like', "%{$this->query}%");
            });
    }

    public function loadMore()
    {
        $this->limit += 10;

        $count = $this->baseQuery()->count();

        if ($this->limit >= $count) {
            $this->hasMore = false;
            $this->limit = $count;
        }
    }

    #[On('toggleLike')]
    public function like($postId)
    {
        $post = Post::findOrFail($postId);

        $post->likes()->toggle(Auth::id());
    }

    public function render()
    {
        $posts = $this->baseQuery()
            ->take($this->limit)
            ->get();

        $users = collect();

        if ($this->query) {
            $users = User::where('username', 'like', "%{$this->query}%")
                ->orWhere('name', 'like', "%{$this->query}%")
                ->limit(5)
                ->get();
        }

        return view('livewire.feed-component', [
            'posts' => $posts,
            'users' => $users,
        ]);
    }
}
