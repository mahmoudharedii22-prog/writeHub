<div>
    <button wire:click="toggleFollow" class="btn btn-sm"
        style="
            border-radius:20px;
            padding:6px 14px;
            font-weight:500;
            {{ $isFollowing ? 'background:#ef4444; color:white;' : 'background:#4f46e5; color:white;' }}
        ">

        {{ $isFollowing ? 'Unfollow' : 'Follow' }}
    </button>
</div>
