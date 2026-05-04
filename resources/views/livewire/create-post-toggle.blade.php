<div class="mb-3">

    <button wire:click="toggle" class="btn rounded-pill px-4
        {{ $open ? 'btn-danger' : 'btn-primary' }}">

        @if ($open)
            Cancel
        @else
            Create Post
        @endif

    </button>

</div>
