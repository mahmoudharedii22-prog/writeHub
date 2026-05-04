<div class="dropdown" wire:poll.5s="load">

    {{-- 🔔 BUTTON --}}
    <button class="btn btn-light position-relative" data-bs-toggle="dropdown">

        <i class="bi bi-bell fs-5"></i>

        {{-- unread count --}}
        @if ($unreadCount)
            <span class="position-absolute top-0 start-100 translate-middle badge bg-danger">
                {{ $unreadCount }}
            </span>
        @endif

    </button>

    {{-- DROPDOWN --}}
    <div class="dropdown-menu dropdown-menu-end p-2 shadow-sm" style="width:320px;">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-2 px-2">

            <small class="fw-semibold text-muted">
                Notifications
            </small>

            @if ($unreadCount)
                <button wire:click="markAllAsRead" class="btn btn-sm btn-link text-primary p-0 text-decoration-none">
                    Mark all as read
                </button>
            @endif

        </div>

        {{-- LIST --}}
        @forelse($notifications as $notification)
            @php $data = $notification->data; @endphp

            <div class="d-flex align-items-start gap-2 p-2 border-bottom">

                {{-- ICON --}}
                <div class="mt-1">
                    @switch($data['type'] ?? null)
                        @case('like')
                            <i class="bi bi-heart-fill text-danger"></i>
                        @break

                        @case('follow')
                            <i class="bi bi-person-plus-fill text-primary"></i>
                        @break

                        @default
                            <i class="bi bi-bell text-secondary"></i>
                    @endswitch
                </div>

                {{-- CONTENT --}}
                <div class="flex-grow-1">

                    <div class="small">
                        {{ $data['message'] ?? '' }}
                    </div>

                    <small class="text-muted">
                        {{ ucfirst($data['type'] ?? 'notification') }}
                    </small>

                </div>

            </div>

            @empty

                <div class="text-center text-muted small p-3">
                    No notifications
                </div>
            @endforelse

        </div>

    </div>
