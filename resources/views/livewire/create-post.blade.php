<div>

    @if ($open)
        <div class="card border-0 shadow-sm rounded-4 mb-3">

            <div class="card-body p-4">

                {{-- TITLE --}}
                <input wire:model="title" class="form-control mb-2 @error('title') is-invalid @enderror"
                    placeholder="Write a title..." style="border-radius:12px; background:#f9fafb;">

                @error('title')
                    <div class="invalid-feedback d-block small mb-2">
                        {{ $message }}
                    </div>
                @enderror

                {{-- CONTENT --}}
                <textarea wire:model="content" class="form-control mb-2 @error('content') is-invalid @enderror" rows="3"
                    placeholder="What's on your mind?" style="border-radius:12px; background:#f9fafb; resize:none;"></textarea>

                @error('content')
                    <div class="invalid-feedback d-block small mb-2">
                        {{ $message }}
                    </div>
                @enderror

                {{-- IMAGE UPLOAD (UI CLEAN) --}}
                <div class="mb-2">

                    <label class="btn btn-outline-secondary btn-sm rounded-pill">
                        📷 Add Image
                        <input type="file" wire:model="image" hidden>
                    </label>

                    @error('image')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                    {{-- uploading state --}}
                    <div wire:loading wire:target="image" class="text-muted small mt-1">
                        Uploading image...
                    </div>

                </div>

                {{-- PREVIEW --}}
                @if ($image)
                    <div class="mb-3">
                        <img src="{{ $image->temporaryUrl() }}" class="rounded-3 w-100"
                            style="max-height:250px; object-fit:cover;">
                    </div>
                @endif

                {{-- FOOTER --}}
                <div class="d-flex justify-content-between align-items-center mt-2">

                    <small class="text-muted">
                        Share something interesting ✨
                    </small>

                    <button wire:click="createPost" class="btn btn-primary btn-sm px-4 rounded-pill"
                        wire:loading.attr="disabled">

                        <span wire:loading.remove>Post</span>
                        <span wire:loading>Posting...</span>

                    </button>

                </div>

            </div>

        </div>
    @endif

</div>
