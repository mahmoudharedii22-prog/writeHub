<div class="mb-4 p-4 rounded-4 text-white"
    style="
        background: linear-gradient(135deg, #4f46e5, #6366f1);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
     ">

    <div class="d-flex flex-column flex-md-row align-items-center gap-4">

        {{-- Avatar --}}
        <img src="{{ $user->getImageUrlAttribute() }}" class="rounded-circle" width="90" height="90"
            style="border:3px solid white;">

        {{-- Info --}}
        <div class="flex-grow-1 text-center text-md-start">

            {{-- Name --}}
            <h4 class="mb-0 fw-bold">
                {{ $user->name }}
            </h4>

            <span style="opacity:0.8;">@ {{ $user->username }}</span>

            {{-- Bio --}}
            <p class="mt-2 mb-2 small" style="opacity:0.85;">
                {{ $user->bio ?? 'No bio yet...' }}
            </p>

            {{-- Stats --}}
            <div class="d-flex justify-content-center justify-content-md-start gap-4 mt-3">

                <div>
                    <div class="fw-bold fs-5">
                        {{ $user->posts_count ?? $user->posts_count }}
                    </div>
                    <small style="opacity:0.8;">Posts</small>
                </div>

                <div>
                    <div class="fw-bold fs-5">
                        <a href="{{ route('profile.followers', $user) }} " class="text-white text-decoration-none">
                            {{ $user->followers_count ?? $user->followers_count }}</a>
                    </div>
                    <small style="opacity:0.8;">Followers</small>
                </div>

                <div>
                    <div class="fw-bold fs-5">
                        <a href="{{ route('profile.following', $user) }}" class="text-white text-decoration-none">
                            {{ $user->following_count }}
                        </a>
                    </div>
                    <small style="opacity:0.8;">Following</small>
                </div>

            </div>

            {{-- Follow --}}
            @if (auth()->check() && auth()->user()->isNot($user))
                <div class="mt-3">
                    <livewire:follow-toggle :user_id="$user->id" />
                </div>
            @endif

        </div>
    </div>
</div>
