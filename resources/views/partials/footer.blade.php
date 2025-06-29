<!-- Footer -->
<footer class="bg-dark text-white pt-5 pb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h5 class="text-uppercase mb-4">🎧 Free Sound Effects</h5>
                <p class="text-white text-decoration-none">The largest library of free sound effects for videos, games, and creative projects. Updated daily with new high-quality sounds.</p>
                <!-- Newsletter Signup -->
                <div class="mt-4">
                    <h6 class="text-uppercase mb-3">Get Updates</h6>
                    <form action="{{ route('subscribe.store') }}" method="POST" class="input-group">
                        @csrf
                        <input type="email" name="email" class="form-control" placeholder="Your email" aria-label="Email" aria-describedby="newsletter-button" required>
                        <button class="btn btn-primary" type="submit" id="newsletter-button">Subscribe</button>
                    </form>

                    {{-- Success/Error Messages --}}
                    @if(session('success'))
                    <div class="alert alert-success mt-3 animate__animated animate__fadeIn">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger mt-3 animate__animated animate__headShake">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ $errors->first('email') }}
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-2 col-md-4 mb-4">
                <h5 class="text-uppercase mb-4">Explore</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/" class="text-white text-decoration-none">Home</a></li>
                    <li class="mb-2"><a href="{{ url('/sound-packs') }}" class="text-white text-decoration-none">Collections</a></li>
                    <li class="mb-2"><a href="{{ route('about') }}" class="text-white text-decoration-none">About Us</a></li>
                    <li class="mb-2"><a href="{{ route('contact') }}" class="text-white text-decoration-none">Contact</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-4 mb-4">
                <h5 class="text-uppercase mb-4">Categories</h5>
                <ul class="list-unstyled">
                    @isset($popularCategories)
                    @foreach($popularCategories as $category)
                    <li class="mb-2">
                        <a href="{{ url('/?category='.$category->slug) }}" class="text-white text-decoration-none">
                            {{ $category->name }}
                        </a>
                    </li>
                    @endforeach
                    @else
                    <li class="mb-2">
                        <a href="{{ url('/sound-packs') }}" class="text-white text-decoration-none">
                            All Sounds
                        </a>
                    </li>
                    @endisset
                </ul>
            </div>

            <div class="col-lg-2 col-md-4 mb-4">
                <h5 class="text-uppercase mb-4">Legal</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('privacy') }}" class="text-white text-decoration-none">Privacy Policy</a></li>
                    <li class="mb-2"><a href="{{ route('terms') }}" class="text-white text-decoration-none">Terms of Use</a></li>
                    <li class="mb-2"><a href="{{ route('licensing') }}" class="text-white text-decoration-none">Licensing</a></li>
                    <li class="mb-2"><a href="{{ route('dmca') }}" class="text-white text-decoration-none">DMCA</a></li>
                </ul>
            </div>

            <div class="col-lg-2 mb-4">
                <h5 class="text-uppercase mb-4">Connect</h5>
                <div class="d-flex gap-3">
                    <a href="#" class="text-white" aria-label="Facebook"><i class="bi bi-facebook fs-5"></i></a>
                    <a href="#" class="text-white" aria-label="Twitter"><i class="bi bi-twitter-x fs-5"></i></a>
                    <a href="#" class="text-white" aria-label="Instagram"><i class="bi bi-instagram fs-5"></i></a>
                    <a href="#" class="text-white" aria-label="YouTube"><i class="bi bi-youtube fs-5"></i></a>
                </div>

                <!-- <div class="mt-4">
                    <a href="https://play.google.com/store/apps" class="d-block mb-2">
                        <img src="{{ asset('images/google-play-badge.png') }}" alt="Get on Google Play" class="img-fluid" style="height: 40px;">
                    </a>
                    <a href="https://www.apple.com/app-store/" class="d-block">
                        <img src="{{ asset('images/app-store-badge.png') }}" alt="Download on the App Store" class="img-fluid" style="height: 40px;">
                    </a>
                </div> -->
            </div>
        </div>

        <hr class="my-4 border-secondary">

        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <p class="mb-0">&copy; {{ date('Y') }} Sound Effects Free. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="mb-0">
                    <span class="d-inline-block me-3">Made with <i class="bi bi-heart-fill text-danger"></i> for creators</span>
                    <span class="d-inline-block">v{{ config('app.version') }}</span>
                </p>
            </div>
        </div>
    </div>
</footer>

<style>
    footer a {
        transition: color 0.2s ease;
    }

    footer a:hover {
        color: var(--bs-primary) !important;
    }

    .bi {
        transition: transform 0.2s ease;
    }

    .bi:hover {
        transform: translateY(-2px);
    }
</style>
