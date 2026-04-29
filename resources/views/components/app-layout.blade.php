<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Social App' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-white">


    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid">

            <a class="navbar-brand fw-bold" href="{{ route('home.index') }}">
                WriteHub
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

   
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home.index') ? 'active fw-bold text-primary' : '' }}"
                                href="{{ route('home.index') }}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Explore</a>
                        </li>
                    @endauth

                </ul>


                <div class="d-flex align-items-center gap-3">

                    <!-- SEARCH (NOW AT END) -->
                    <form class="d-flex">
                        <input class="form-control form-control-sm me-2" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-success btn-sm">
                            Search
                        </button>
                    </form>

                    @auth
                        <li class="nav-item dropdown list-unstyled">

                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown">

                                <img src="{{ auth()->user()->getImageUrlAttribute() }}" class="rounded-circle"
                                    width="32" height="32">

                                <span class="fw-semibold">
                                    {{ auth()->user()->username }}
                                </span>

                            </a>

                            <ul class="dropdown-menu dropdown-menu-end shadow-sm">

                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2" href="#">
                                        <i class="bi bi-person"></i> Profile
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2" href="#">
                                        <i class="bi bi-gear"></i> Settings
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

                        </li>
                    @endauth

                </div>

            </div>
        </div>
    </nav>

    <main class="py-4">
        {{ $slot }}
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
