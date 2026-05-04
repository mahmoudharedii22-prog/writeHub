<div class="mb-3 p-3 rounded-4" style="background:#fff; box-shadow:0 6px 20px rgba(0,0,0,0.05);">

    {{-- HEADER --}}
    <div class="d-flex align-items-center gap-2 mb-2">
        @php $user = $post->user; @endphp

        <img src="{{ $user->getImageUrlAttribute() }}" class="rounded-circle" width="42" height="42">

        <div>
            <div class="fw-semibold">{{ $user->name }}</div>

            <a href="{{ route('profile.show', $user) }}" class="text-decoration-none">
                @ {{ $user->username }}
            </a>
        </div>
    </div>

    {{-- BODY --}}
    @if ($isEditing)

        <input wire:model="title" class="form-control mb-2">

        <textarea wire:model="content" class="form-control mb-2"></textarea>

        <div class="d-flex gap-2">
            <button wire:click="updatePost" class="btn btn-success btn-sm">
                Update
            </button>

            <button wire:click="$set('isEditing', false)" class="btn btn-secondary btn-sm">
                Cancel
            </button>
        </div>
    @else
        {{-- TITLE --}}
        <div class="mb-2 text-center fw-semibold bg-light p-2 rounded-3">
            {{ $post->title }}
        </div>

        {{-- IMAGE --}}
        @if ($post->image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $post->image) }}" class="rounded-3 w-100"
                    style="max-height:400px; object-fit:cover;">
            </div>
        @endif

        {{-- CONTENT --}}
        <div class="mb-2">
            {{ $post->content }}
        </div>

    @endif

    {{-- ACTIONS --}}
    @if (!$isEditing)

        <div class="d-flex justify-content-between align-items-center mt-2">

            {{-- LEFT --}}
            <div class="d-flex gap-2">
                <livewire:like-toggle :post="$post" :key="'like-' . $post->id" />
            </div>

            {{-- TIME --}}
            <small style="color:#9ca3af;">
                {{ $post->created_at->diffForHumans() }}
            </small>

            {{-- OWNER ACTIONS --}}
            @if (auth()->id() === $post->user_id)
                <div class="d-flex gap-2">

                    <button onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                        wire:click="deletePost" class="btn btn-sm btn-danger rounded-pill">
                        Delete
                    </button>

                    <button wire:click="editPost" class="btn btn-sm btn-light border rounded-pill">
                        Edit
                    </button>

                </div>
            @endif

        </div>

    @endif

</div>
