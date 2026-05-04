<div>

    {{-- 🔍 SEARCH MODE --}}
    @if (filled($query))

        {{-- 👤 USERS --}}
        @if ($users->count())
            <div class="mb-4">

                <div class="fw-semibold text-muted small mb-2">
                    👤 People
                </div>

                @foreach ($users as $user)
                    <div class="mb-2">
                        <livewire:user-card :user="$user" :key="'user' . $user->id" />
                    </div>
                @endforeach

            </div>
        @endif


        {{-- 📝 POSTS --}}
        @if ($posts->count())
            <div class="mb-3">

                <div class="fw-semibold mb-2 text-muted small">
                    📝 Posts
                </div>

                @foreach ($posts as $post)
                    <div class="mb-3">
                        <livewire:post-card :post="$post" :key="'post-' . $post->id" />
                    </div>
                @endforeach

            </div>
        @endif


        {{-- 🚫 EMPTY STATE --}}
        @if ($users->isEmpty() && $posts->isEmpty())
            <div class="text-center text-muted py-5">
                No results found for "<strong>{{ $query }}</strong>"
            </div>
        @endif
    @else
        {{-- 🏠 FEED MODE --}}
        @forelse ($posts as $post)
            <div class="mb-3">
                <livewire:post-card :post="$post" :key="$post->id" />
            </div>
        @empty
            <div class="text-center py-5 text-muted">

                <div class="mb-2">
                    <i class="bi bi-journal-x fs-1 text-secondary"></i>
                </div>

                <div class="fw-semibold fs-5 text-dark">
                    No posts yet
                </div>

                @if ($type === 'home')
                    Follow people or create your first post ✨
                @elseif($type === 'explore')
                    No posts found in explore right now 🔍
                @else
                    Start exploring content 🚀
                @endif

            </div>
        @endforelse

    @endif


    {{-- 🔄 LOAD MORE --}}
    @if (empty($query) && $posts->count() > 0)
        <div class="text-center py-3 text-muted">

            @if ($hasMore)
                <div x-data x-intersect="$wire.loadMore()">
                    Loading more...
                </div>
            @else
                <div class="text-center py-4 text-muted">

                    <i class="bi bi-check2-circle fs-4 text-success"></i>

                    <div class="fw-semibold mt-2 text-dark">
                        You’re all caught up
                    </div>

                    <small>
                        No more posts to load
                    </small>

                </div>
            @endif

        </div>
    @endif

</div>
