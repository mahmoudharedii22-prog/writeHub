<div class="card mb-3 shadow-sm">

    <div class="card-body d-flex align-items-center gap-2">

        <img src="{{ $post->user->image ? asset($post->user->image) : asset('images/default-profile-image.png') }}"
            class="rounded-circle" width="40" height="40">

        <div>
            <div class="fw-bold">
                {{ $post->user->name }}
            </div>
            <a href="{{ route('profile.show', $post->user) }}" class="text-decoration-none text-muted link-primary">
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

            @php
                $liked = $post->likes->contains(auth()->id());
            @endphp

            <button wire:click="like({{ $post->id }})"
                class="btn btn-sm {{ $liked ? 'btn-primary' : 'btn-outline-primary' }}">

                {{ $liked ? '❤️ Liked' : '👍 Like' }}
                ({{ $post->likes_count }})
            </button>

            <button class="btn btn-sm btn-outline-secondary">
                💬 Comment ({{ 0 }})
            </button>

        </div>

        <small class="text-muted">
            {{ $post->created_at->diffForHumans() }}
        </small>

    </div>

</div>
