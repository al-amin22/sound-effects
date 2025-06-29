<header class="bg-dark text-white sticky-top shadow-sm">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
            <!-- Logo/Brand with schema markup -->
            <a href="{{ url('/') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none" itemprop="url">
                <span class="fs-4 fw-bold" itemprop="name">🎧 Free Sound Effects</span>
                <meta itemprop="logo" content="{{ asset('images/logo.png') }}">
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler d-md-none border-0 px-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-white">☰</span>
            </button>

            <!-- Desktop Navigation -->
            <nav class="d-none d-md-flex gap-3 align-items-center" aria-label="Main navigation">
                <a href="/" class="text-white text-decoration-none position-relative nav-link-hover" aria-current="page">Home</a>
                <a href="{{ url('/sound-packs') }}" class="text-white text-decoration-none position-relative nav-link-hover">Collection</a>
                <a href="{{ route('about') }}" class="text-white text-decoration-none position-relative nav-link-hover">About</a>
                <a href="{{ route('contact') }}" class="text-white text-decoration-none position-relative nav-link-hover">Contact</a>

                @auth
                <div class="dropdown">
                    <a href="#" class="text-white text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle me-1"></i> Account
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
                @endauth
            </nav>
        </div>

        <!-- Mobile Navigation -->
        <div class="collapse d-md-none pb-3" id="navbarCollapse">
            <nav class="d-flex flex-column gap-2" aria-label="Mobile navigation">
                <a href="/" class="text-white text-decoration-none py-2 border-bottom" aria-current="page">Home</a>
                <a href="{{ url('/sound-packs') }}" class="text-white text-decoration-none py-2 border-bottom">Collection</a>
                <a href="{{ route('about') }}" class="text-white text-decoration-none py-2 border-bottom">About</a>
                <a href="{{ route('contact') }}" class="text-white text-decoration-none py-2 border-bottom">Contact</a>

                @auth
                <a href="{{ route('admin.dashboard') }}" class="text-white text-decoration-none py-2 border-bottom">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="w-100">
                    @csrf
                    <button type="submit" class="btn btn-outline-light w-100 mt-2">Logout</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="btn btn-outline-light w-100 mt-2">Login</a>
                @endauth
            </nav>
        </div>
    </div>
</header>

<style>
    .nav-link-hover::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -2px;
        left: 0;
        background-color: #fff;
        transition: width 0.3s ease;
    }

    .nav-link-hover:hover::after {
        width: 100%;
    }

    .navbar-toggler:focus {
        box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.5);
    }

    @media (max-width: 767.98px) {
        .dropdown-menu {
            position: static;
            float: none;
        }
    }
</style>