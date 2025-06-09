<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ $title ?? 'Login' }}</title>

    <!-- Favicon dengan emoji 🎧 -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'><text y='50' font-size='50'>🎧</text></svg>" />

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Optional: Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .logo-emoji {
            font-size: 5rem;
            line-height: 1;
            color: #6610f2;
            /* warna ungu bootstrap */
            user-select: none;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100 justify-content-center align-items-center">

    <div>
        <a href="{{ url('/') }}" aria-label="Sound Effects Logo" class="logo-emoji text-center">
            🎧
        </a>
    </div>

    <div class="w-100" style="max-width: 400px; margin-top: 1.5rem; padding: 2rem; background: #fff; box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,.075); border-radius: 0.375rem;">

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2 class="mb-4 text-center">Login</h2>

            <!-- Email input -->
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    id="email"
                    name="email"
                    placeholder="you@example.com"
                    value="{{ old('email') }}"
                    required
                    autofocus />
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password input -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    id="password"
                    name="password"
                    placeholder="Your password"
                    required />
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember me and forgot password -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} />
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <a href="{{ route('password.request') }}">Forgot password?</a>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

    </div>

    <!-- Bootstrap JS Bundle (Popper + Bootstrap JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
