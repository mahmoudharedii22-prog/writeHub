<div>

    @forelse ($likedPosts as $post)
        <div class="card mb-3 shadow-sm">


            <div class="card-body d-flex align-items-center gap-2">

                <img src="{{ $post->user->image ? asset($post->user->image) : asset('images/default-profile-image.png') }}"
                    class="rounded-circle" width="40" height="40">

                <div>
                    <div class="fw-bold">
                        {{ $post->user->name }}
                    </div>

                    <a href="{{ route('profile.show', $post->user) }}" class="text-decoration-none text-muted">
                        <small>
                            {{ $post->user->username }}
                        </small>
                    </a>
                </div>

            </div>

            <div class="card-body pt-0">

                <p class="mb-2">{{ $post->content }}</p>

                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded">
                @endif

            </div>


            <div class="card-body pt-0 d-flex justify-content-between align-items-center">

                <div class="d-flex gap-3">

                    <button class="btn btn-sm btn-primary">
                        ❤️ Liked ({{ $post->likes_count }})
                    </button>

                    <button class="btn btn-sm btn-outline-secondary">
                        💬 Comment
                    </button>

                </div>

                <small class="text-muted">
                    {{ $post->created_at->diffForHumans() }}
                </small>

            </div>

        </div>

    @empty
        @if ($likedPosts->count() > 0)
            <div class="text-center text-muted py-5">
                🚫 No more liked posts
            </div>
        @else
            <div class="text-center text-muted py-5">
                No liked posts yet 💔
            </div>
        @endif
    @endforelse


    @if ($hasMore)
        <div x-data x-intersect="$wire.loadMore()" class="text-center py-3 text-muted">
            Loading more...
        </div>
    @endif

</div>
