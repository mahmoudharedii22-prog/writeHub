<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'WriteHub' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- 🎨 GLOBAL THEME --}}
    <style>
        body {
            background: #f5f7fb;
        }

        /* NAVBAR */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #e5e7eb;
        }

        .nav-link {
            color: #6b7280 !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #4f46e5 !important;
        }

        .nav-link.active {
            color: #4f46e5 !important;
        }

        /* SEARCH */
        .search-input {
            border-radius: 20px;
            background: #f3f4f6;
            border: none;
        }

        .search-input:focus {
            box-shadow: none;
            background: #eef2ff;
        }

        .search-btn {
            border-radius: 20px;
        }

        /* USER */
        .avatar {
            border: 2px solid #e5e7eb;
        }

        .hover-bg:hover {
            background: #f3f4f6;
        }

        /* MAIN LAYOUT */
        main {
            min-height: 80vh;
        }

        /* DROP DOWN */
        .dropdown-menu {
            border-radius: 12px;
        }
    </style>
</head>

<body>

    {{-- 🔝 NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">

        <div class="container">

            {{-- LOGO --}}
            <a class="navbar-brand fw-bold text-dark" href="{{ route('home.index') }}">
                WriteHub
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">

                {{-- LINKS --}}
                <ul class="navbar-nav me-auto">

                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('explore.*') ? 'active' : '' }}"
                                href="{{ route('home.index') }}">
                                <i class="bi bi-house me-1"></i>
                                For U
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('explore.*') ? 'active' : '' }}"
                                href="{{ route('home.explore') }}">
                                <i class="bi bi-compass me-1"></i>
                                Explore
                            </a>
                        </li>
                    @endauth

                </ul>

                {{-- RIGHT SIDE --}}
                <div class="d-flex align-items-center gap-3">

                    @auth
                        <livewire:notification-bell />


                        <div class="dropdown">

                            <a class="d-flex align-items-center gap-2 text-decoration-none px-2 py-1 rounded hover-bg"
                                data-bs-toggle="dropdown">

                                <img src="{{ auth()->user()->getImageUrlAttribute() }}" class="rounded-circle avatar"
                                    width="34" height="34">

                                <span class="fw-semibold text-dark d-none d-md-inline">
                                    {{ auth()->user()->username }}
                                </span>

                                <i class="bi bi-chevron-down small text-muted"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-2">

                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2"
                                        href="{{ route('profile.show', auth()->user()) }}">
                                        <i class="bi bi-person"></i>
                                        Profile
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item text-danger d-flex align-items-center gap-2">
                                            <i class="bi bi-box-arrow-right"></i>
                                            Logout
                                        </button>
                                    </form>
                                </li>

                            </ul>
                        </div>
                    @endauth

                </div>
            </div>

        </div>

    </nav>

    {{-- 🧱 CONTENT --}}
    <main class="py-4">
        <div class="container">
            {{ $slot }}
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>


</html>
