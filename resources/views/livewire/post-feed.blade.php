<div>
    @foreach ($posts as $post)
        <x-post-card :post="$post" />
    @endforeach

    @if ($hasMore)
        <div x-data x-intersect="$wire.loadMore()" class="text-center py-4 text-muted">
            Loading more...
        </div>
    @else
        <div class="text-center py-4 text-muted">
            🚫 No more posts
        </div>
    @endif
</div>
