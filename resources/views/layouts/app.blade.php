<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Primary Meta Tags -->
    <title>@yield('title', $meta['title'] ?? 'Free Sound Effects Library 2025') – soundeffectsfree.com</title>
    <meta name="description" content="@yield('description', $meta['description'] ?? 'Download free sound effects for videos, games, films, and more. Discover high-quality, royalty-free audio files updated regularly on soundeffectsfree.com.')">
    <meta name="keywords" content="@yield('keywords', $meta['keywords'] ?? 'free sound effects, royalty free sound effects, sound effects download, audio effects, video editing sounds, game sounds, sound library, free SFX 2025')">
    <meta name="author" content="soundeffectsfree.com">
    <meta name="theme-color" content="#212529">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', $meta['og_type'] ?? 'website')">
    <meta property="og:title" content="@yield('og_title', $meta['og_title'] ?? 'Free Sound Effects Library 2025 – soundeffectsfree.com')">
    <meta property="og:description" content="@yield('og_description', $meta['og_description'] ?? 'Explore our growing collection of free sound effects for creative projects. All files are free to use and regularly updated.')">
    <meta property="og:image" content="@yield('og_image', $meta['og_image'] ?? asset('images/og-soundeffectsfree2025.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="soundeffectsfree.com">
    @isset($soundEffect)
    <meta property="og:audio" content="{{ asset($soundEffect->audio_path) }}">
    <meta property="og:audio:type" content="audio/mpeg">
    <meta property="og:audio:duration" content="{{ $soundEffect->duration }}">
    @endisset

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', $meta['twitter_title'] ?? 'Free Sound Effects Library 2025 – soundeffectsfree.com')">
    <meta name="twitter:description" content="@yield('twitter_description', $meta['twitter_description'] ?? 'Download high-quality free sound effects for your creative projects. 100% royalty-free and updated regularly.')">
    <meta name="twitter:image" content="@yield('twitter_image', $meta['twitter_image'] ?? asset('images/twitter-soundeffectsfree2025.jpg'))">
    <meta name="twitter:site" content="@soundeffectsfree">

    <!-- Robots -->
    <meta name="robots" content="index, follow">
    <link rel="alternate" href="{{ url()->current() }}" hreflang="en" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('favicon/safari-pinned-tab.svg') }}" color="#212529">
    <meta name="msapplication-TileColor" content="#212529">

    <!-- Structured Data -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@graph": [{
                    "@type": "WebSite",
                    "@id": "{{ url('/') }}#website",
                    "url": "{{ url('/') }}",
                    "name": "soundeffectsfree.com",
                    "description": "Free sound effects library for videos, games, and creative projects",
                    "publisher": {
                        "@id": "{{ url('/') }}#organization"
                    },
                    "potentialAction": {
                        "@type": "SearchAction",
                        "target": "{{ url('/search?q={search_term_string}') }}",
                        "query-input": "required name=search_term_string"
                    }
                },
                {
                    "@type": "Organization",
                    "@id": "{{ url('/') }}#organization",
                    "name": "soundeffectsfree.com",
                    "url": "{{ url('/') }}",
                    "logo": {
                        "@type": "ImageObject",
                        "url": "{{ asset('images/logo.png') }}"
                    },
                    "sameAs": [
                        "https://facebook.com/soundeffectsfree",
                        "https://twitter.com/soundeffectsfree",
                        "https://instagram.com/soundeffectsfree"
                    ]
                },
                {
                    "@type": "CollectionPage",
                    "@id": "{{ url()->current() }}#webpage",
                    "url": "{{ url()->current() }}",
                    "name": "@yield('title', $meta['title'] ?? 'Free Sound Effects Library')",
                    "description": "@yield('description', $meta['description'] ?? 'Download free sound effects for creative projects')",
                    "isPartOf": {
                        "@id": "{{ url('/') }}#website"
                    },
                    "breadcrumb": {
                        "@id": "{{ url()->current() }}#breadcrumb"
                    }
                },
                {
                    "@type": "BreadcrumbList",
                    "@id": "{{ url()->current() }}#breadcrumb",
                    "itemListElement": [{
                            "@type": "ListItem",
                            "position": 1,
                            "name": "Home",
                            "item": "{{ url('/') }}"
                        }
                        @if(request('category')), {
                            "@type": "ListItem",
                            "position": 2,
                            "name": "{{ $currentCategory->name ?? 'Category' }}",
                            "item": "{{ url()->current() }}"
                        }
                        @endif
                    ]
                }
            ]
        }
    </script>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-S2M168YR5Z"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-S2M168YR5Z');
    </script>

    <!-- AdSense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1555848721226553" crossorigin="anonymous"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="d-flex flex-column h-100">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-XXXXXX" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    @include('partials.nav')

    <main class="flex-shrink-0">
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Toast Notification -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Notification</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="toastMessage">
                <!-- Message will be inserted here -->
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button type="button" class="btn btn-primary btn-floating rounded-circle position-fixed bottom-3 end-3 d-none" id="btn-back-to-top">
        <i class="bi bi-arrow-up"></i>
    </button>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')

    <script>
        // Back to top button
        const backToTopButton = document.getElementById('btn-back-to-top');

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('d-none');
            } else {
                backToTopButton.classList.add('d-none');
            }
        });

        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Service Worker Registration
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js').then(function(registration) {
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }, function(err) {
                    console.log('ServiceWorker registration failed: ', err);
                });
            });
        }

        // Performance monitoring
        window.addEventListener('load', function() {
            if ('performance' in window) {
                const timing = performance.timing;
                const loadTime = timing.loadEventEnd - timing.navigationStart;
                console.log(`Page loaded in ${loadTime}ms`);

                // Send to analytics if needed
                if (loadTime > 3000) {
                    gtag('event', 'slow_load_time', {
                        'event_category': 'Performance',
                        'value': loadTime
                    });
                }
            }
        });
    </script>
</body>

</html>