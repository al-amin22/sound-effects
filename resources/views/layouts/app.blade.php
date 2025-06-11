<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Free Sound Effects Library 2025') – soundeffectsfree.com</title>

    <meta name="description" content="@yield('description', 'Download free sound effects for videos, games, films, and more. Discover high-quality, royalty-free audio files updated regularly on soundeffectsfree.com.')">
    <meta name="keywords" content="free sound effects, royalty free sound effects, sound effects download, audio effects, video editing sounds, game sounds, sound library, free SFX 2025">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:title" content="@yield('og_title', 'Free Sound Effects Library 2025 – soundeffectsfree.com')">
    <meta property="og:description" content="@yield('description', 'Explore our growing collection of free sound effects for creative projects. All files are free to use and regularly updated.')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-soundeffectsfree2025.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="soundeffectsfree.com">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Free Sound Effects Library 2025 – soundeffectsfree.com')">
    <meta name="twitter:description" content="@yield('description', 'Download high-quality free sound effects for your creative projects. 100% royalty-free and updated regularly.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/twitter-soundeffectsfree2025.jpg'))">
    <meta name="twitter:site" content="@soundeffectsfree">

    <!-- Robots -->
    <meta name="robots" content="index, follow">

    <!-- Structured Data: WebSite & Organization -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@graph": [{
                    "@type": "WebSite",
                    "@id": "{{ url('/') }}#website",
                    "url": "{{ url('/') }}",
                    "name": "soundeffectsfree.com",
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
                    }
                }
            ]
        }
    </script>

    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 64 64%22><text y=%2250%22 font-size=%2250%22>🎧</text></svg>">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }
    </style>
</head>


<body>
    @include('partials.nav')

    <main class="container py-4">
        @yield('content')
    </main>

    @include('partials.footer')
    @stack('scripts')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>