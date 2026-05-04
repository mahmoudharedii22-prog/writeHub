<div class="card border-0 shadow-sm rounded-4 mb-3">

    <div class="card-body">

        {{-- HEADER --}}
        <div class="d-flex align-items-center gap-3">

            {{-- Avatar --}}
            <img src="{{ $user->getImageUrlAttribute() }}" class="rounded-circle" width="50" height="50"
                style="border:2px solid #f3f4f6;">

            <div class="flex-grow-1">

                {{-- Name --}}
                <div class="fw-semibold">
                    {{ $user->name }}
                </div>

                {{-- Username --}}
                <div class="text-muted small">
                    <a href="{{ route('profile.show', $user) }}" class="text-decoration-none"> @
                        {{ $user->username }}</a>
                </div>

            </div>

            {{-- FOLLOW BUTTON --}}
            @if ($user->id != Auth::id())
                <livewire:follow-toggle :user_id="$this->user->id" />
            @endif

        </div>

        {{-- BIO --}}
        @if ($user->bio)
            <div class="mt-3 text-muted small">
                {{ $user->bio }}
            </div>
        @endif

        {{-- STATS --}}
        <div class="d-flex gap-3 mt-3 text-center">

            <div>
                <div class="fw-bold">
                    {{ $user->followers()->count() }}
                </div>
                <div class="text-muted small">Followers</div>
            </div>

            <div>
                <div class="fw-bold">
                    {{ $user->following()->count() }}
                </div>
                <div class="text-muted small">Following</div>
            </div>

        </div>

    </div>

</div>
