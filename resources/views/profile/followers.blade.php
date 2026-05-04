<x-app-layout>

    <div class="container py-4" style="max-width: 650px;">

        {{-- HEADER --}}
        <div class="mb-4 text-center">
            <h4 class="fw-bold mb-1">{{ $user->name }}</h4>
            <div class="text-muted">
                Followers
            </div>
        </div>

        {{-- LIST --}}
        @forelse ($followers as $follow)
            <div class="card border-0 shadow-sm mb-2 rounded-4 hover-bg">

                <div class="card-body d-flex align-items-center justify-content-between py-3">

                    {{-- USER INFO --}}
                    <div class="d-flex align-items-center gap-3">

                        <img src="{{ $follow->getImageUrlAttribute() }}" class="rounded-circle" width="48"
                            height="48" style="object-fit: cover;">

                        <div>
                            <div class="fw-semibold">
                                {{ $follow->name }}
                            </div>

                            <div class="text-muted small">
                                @ {{ $follow->username }}
                            </div>
                        </div>

                    </div>

                    {{-- OPTIONAL BUTTON --}}
                    <a href="{{ route('profile.show', ['user' => $follow]) }}"
                        class="btn btn-sm btn-outline-primary rounded-pill px-3">
                        View
                    </a>

                </div>

            </div>

        @empty

            <div class="text-center text-muted py-5">
                <div style="font-size: 18px;">👥</div>
                No followers yet
            </div>
        @endforelse

    </div>

    {{-- SIMPLE HOVER STYLE --}}
    <style>
        .hover-bg {
            transition: 0.2s;
        }

        .hover-bg:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }
    </style>

</x-app-layout>
