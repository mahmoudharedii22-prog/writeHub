<!-- resources/views/components/user-card.blade.php -->
<div class="card mb-2 shadow-sm">

    <div class="card-body d-flex align-items-center gap-3">

        <img src="{{ $user->getImageUrlAttribute() }}" class="rounded-circle" width="50" height="50">

        <div class="flex-grow-1">

            <div class="fw-bold">
                {{ $user->name }}
            </div>

            <small class="text-muted">
                @ {{ $user->username }}
            </small>

        </div>

        <a href="{{ route('profile.show', $user) }}" class="btn btn-sm btn-outline-primary">
            View
        </a>

    </div>

</div>
