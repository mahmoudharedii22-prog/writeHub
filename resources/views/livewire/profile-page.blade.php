<div>


    <div class="card mb-4">
        <div class="card-body d-flex align-items-center gap-3">

            <img src="{{ $user->getImageUrlAttribute() }}" class="rounded-circle" width="80" height="80">

            <div class="flex-grow-1">

                <h4 class="mb-0">{{ $user->name }}</h4>

                <small class="text-muted">
                    @ {{ $user->username }}
                </small>

                <p class="mt-2 mb-0 text-muted">
                    {{ $user->bio ?? 'No bio yet...' }}
                </p>

                <div class="d-flex gap-3 mt-2">
                    <span><strong>{{ $user->posts->count() ?? 0 }}</strong> Posts</span>
                    <span><strong>{{ $user->followers->count() ?? 0 }}</strong> Followers</span>
                    <span><strong>{{ $user->followings->count() ?? 0 }}</strong> Following</span>
                </div>

            </div>


            @if (auth()->user()->isNot($user))
                <livewire:follow-toggle :user_id="$user->id" />
            @endif

        </div>
    </div>

    <ul class="nav nav-tabs mb-3">

        <li class="nav-item">
            <button class="nav-link {{ $tab === 'posts' ? 'active' : '' }}" wire:click="setTab('posts')">
                Posts
            </button>
        </li>

        <li class="nav-item">
            <button class="nav-link {{ $tab === 'likes' ? 'active' : '' }}" wire:click="setTab('likes')">
                Likes
            </button>
        </li>

    </ul>

    <div>

        @if ($tab === 'posts')
            <livewire:feed-component :user="$user" />
        @else
            <livewire:like-feed :user="$user" />
        @endif

    </div>

</div>
