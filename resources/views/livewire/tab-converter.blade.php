<div class="bg-white rounded-4 shadow-sm p-3">

    {{-- TABS --}}
    <div class="d-flex gap-2 border-bottom pb-2 mb-3">

        <button wire:click="$set('activeTab', 'posts')" class="btn btn-sm rounded-pill"
            style="{{ $activeTab === 'posts' ? 'background:#4f46e5;color:white;' : 'background:#f3f4f6;color:#374151;' }}">
            📝 Posts
        </button>

        <button wire:click="$set('activeTab', 'likes')" class="btn btn-sm rounded-pill"
            style="{{ $activeTab === 'likes' ? 'background:#4f46e5;color:white;' : 'background:#f3f4f6;color:#374151;' }}">
            ❤️ Likes
        </button>

    </div>

    {{-- CONTENT --}}
    <div>

        @if ($activeTab === 'posts')
            <livewire:feed-component type="profile" :userId="$user->id" :key="'profile-posts-' . $user->id" />
        @endif

        @if ($activeTab === 'likes')
            <livewire:feed-component type="liked" :userId="$user->id" :key="'profile-likes-' . $user->id" />
        @endif

    </div>

</div>
