<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class FeedComponent extends Component
{
    public $type = 'home';

    public $userId;

    public $query;

    public $limit = 10;

    protected $listeners = [
        'likeUpdated' => '$refresh',
        'postUpdated' => '$refresh',
    ];

    public function loadMore()
    {
        $this->limit += 10;
    }

    #[On('searchUpdated')]
    public function searchUpdated($query)
    {
        $this->type = 'search';
        $this->query = $query;
    }

    public function getPostsProperty()
    {
        $followingIds = Auth::user()
            ->following()
            ->pluck('following_id');
        $query = match ($this->type) {

            'home' => Post::query()->whereIn('user_id', $followingIds->merge([Auth::id()])),

            'explore' => Post::query()->whereNotIn('user_id', $followingIds->merge([Auth::id()])),

            'profile' => Post::where('user_id', $this->userId),

            'liked' => Post::whereHas('likes', function ($q) {
                $q->where('user_id', $this->userId);
            }),

            'search' => Post::where('content', 'like', "%{$this->query}%"),

            default => Post::query(),
        };

        return $query
            ->with(['user'])
            ->withCount(['likes'])
            ->orderByDesc('likes_count')
            ->orderByDesc('created_at')
            ->limit($this->limit)
            ->get();
    }

    #[On('postCreated')]
    public function refreshFeed()
    {
        $this->reset('limit');
        $this->dispatch('$refresh');
    }

    public function getHasMoreProperty()
    {
        return $this->posts->count() === $this->limit;
    }

    public function getUsersProperty()
    {
        if (! $this->query) {
            return collect();
        }

        return User::where('username', 'like', "%{$this->query}%")
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.feed-component', [
            'posts' => $this->posts,
            'hasMore' => $this->hasMore,
            'users' => $this->users,
        ]);
    }
}
