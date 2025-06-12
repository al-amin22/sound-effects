<header class="bg-dark text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="{{ url('/') }}" class="text-white fs-4 fw-bold text-decoration-none">🎧 Free Sound Effects</a>
        <nav class="d-none d-md-flex gap-3 align-items-center">
            <a href="/" class="text-white text-decoration-none">Home</a>
            <a href="{{ route('collection') }}" class="text-white text-decoration-none">Collection</a>
            <a href="{{ route('about') }}" class="text-white text-decoration-none">About</a>
            <a href="{{ route('privacy') }}" class="text-white text-decoration-none">Privacy</a>
            <a href="{{ route('terms') }}" class="text-white text-decoration-none">Terms</a>
            <a href="{{ route('contact') }}" class="text-white text-decoration-none">Contact</a>

            @auth
            <a href="{{ route('admin.dashboard') }}" class="text-white text-decoration-none">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-link text-white text-decoration-none p-0">Logout</button>
            </form>
            @else
            <a href="{{ route('login') }}" class="text-white text-decoration-none">Login</a>
            @endauth
        </nav>
    </div>
</header>
