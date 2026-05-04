<div>
    <button wire:click="toggleLike" class="btn btn-sm d-flex align-items-center gap-1"
        style="
            border-radius:20px;
            padding:4px 12px;
            border:none;
            {{ $isLiked ? 'background:#fee2e2; color:#dc2626;' : 'background:#f3f4f6; color:#374151;' }}
        ">

        {{-- ICON --}}
        <i class="bi {{ $isLiked ? 'bi-heart-fill' : 'bi-heart' }}"></i>

        {{-- COUNT --}}
        <span>{{ $post->likes_count }}</span>

    </button>
</div>
