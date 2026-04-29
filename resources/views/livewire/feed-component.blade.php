<div>

    {{-- 🔍 SEARCH MODE --}}
    @if ($query)

        <!-- USERS -->
        @if ($users->count())
            <div class="mb-4">

                <div class="fw-semibold mb-2 text-muted small">
                    👤 People
                </div>

                @foreach ($users as $user)
                    <x-user-card :user="$user" />
                @endforeach

            </div>
        @endif


        <!-- POSTS -->
        @if ($posts->count())
            <div class="mb-3">

                <div class="fw-semibold mb-2 text-muted small">
                    📝 Posts
                </div>

                @foreach ($posts as $post)
                    <x-post-card :post="$post" />
                @endforeach

            </div>
        @endif


        <!-- EMPTY -->
        @if (!$users->count() && !$posts->count())
            <div class="text-center py-5 text-muted">
                No results found for "<strong>{{ $query }}</strong>" 🔍
            </div>
        @endif


        {{-- 🏠 FEED MODE --}}
    @else
        @foreach ($posts as $post)
            <x-post-card :post="$post" />
        @endforeach

    @endif


    <!-- LOAD MORE (للـ posts بس) -->
    @if (!$query && $hasMore)
        <div x-data x-intersect="$wire.loadMore()" class="text-center py-4 text-muted">
            Loading more...
        </div>
    @elseif (!$query && !$hasMore)
        <div class="text-center py-4 text-muted">
            🚫 No more posts
        </div>
    @endif

</div>
