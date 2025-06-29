@extends('layouts.app')

@section('title', 'About Us | Free Royalty-Free Sound Effects Library')
@section('description', 'Discover Sound Effects Free - your source for high-quality, royalty-free sound effects. Learn about our mission to provide free audio resources for creators worldwide.')

@section('content')
<div class="container py-4">
    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Main Heading -->
            <h1 class="display-5 fw-bold mb-4">About Sound Effects Free</h1>

            <!-- Hero Section -->
            <div class="bg-light p-4 p-md-5 rounded-3 mb-5">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <p class="lead mb-4">Empowering creators worldwide with high-quality, royalty-free sound effects since 2023.</p>
                        <p>Our mission is to remove barriers to creativity by providing professional-grade audio resources completely free of charge.</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('images/sound-wave-illustration.png') }}" alt="Sound waves illustration" class="img-fluid" loading="lazy">
                    </div>
                </div>
            </div>

            <!-- Why Choose Us Section -->
            <section class="mb-5">
                <h2 class="h2 mb-4 fw-bold">Why Choose Sound Effects Free?</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-primary bg-opacity-10 p-2 rounded-circle me-3">
                                        <i class="bi bi-check-circle-fill text-primary fs-4"></i>
                                    </div>
                                    <h3 class="h5 mb-0">100% Royalty-Free</h3>
                                </div>
                                <p class="mb-0">All sounds are completely free for personal and commercial projects with no hidden fees.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-primary bg-opacity-10 p-2 rounded-circle me-3">
                                        <i class="bi bi-megaphone-fill text-primary fs-4"></i>
                                    </div>
                                    <h3 class="h5 mb-0">No Attribution Required</h3>
                                </div>
                                <p class="mb-0">Use our sounds without the obligation to credit, though we always appreciate it.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-primary bg-opacity-10 p-2 rounded-circle me-3">
                                        <i class="bi bi-collection-play-fill text-primary fs-4"></i>
                                    </div>
                                    <h3 class="h5 mb-0">Curated Collection</h3>
                                </div>
                                <p class="mb-0">Professionally curated library with sounds organized for easy discovery.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-primary bg-opacity-10 p-2 rounded-circle me-3">
                                        <i class="bi bi-cloud-arrow-down-fill text-primary fs-4"></i>
                                    </div>
                                    <h3 class="h5 mb-0">Instant Access</h3>
                                </div>
                                <p class="mb-0">No registration required - browse and download immediately.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Our Story Section -->
            <section class="mb-5">
                <h2 class="h2 mb-4 fw-bold">Our Story</h2>
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <p>Founded in 2023, Sound Effects Free began as a passion project to help independent creators overcome the challenge of finding affordable, high-quality sound effects. What started as a small collection has grown into a comprehensive library serving thousands of creators worldwide.</p>
                        <p class="mb-0">We believe that great audio shouldn't be a luxury, and that's why we're committed to keeping all our resources completely free while maintaining professional standards.</p>
                    </div>
                </div>
            </section>

            <!-- Stats Section -->
            <section class="mb-5">
                <h2 class="h2 mb-4 fw-bold">By The Numbers</h2>
                <div class="row text-center g-4">
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-light rounded">
                            <div class="fs-2 fw-bold text-primary">10,000+</div>
                            <div class="text-muted">Sound Effects</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-light rounded">
                            <div class="fs-2 fw-bold text-primary">500,000+</div>
                            <div class="text-muted">Monthly Downloads</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-light rounded">
                            <div class="fs-2 fw-bold text-primary">100+</div>
                            <div class="text-muted">Countries Served</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-light rounded">
                            <div class="fs-2 fw-bold text-primary">24/7</div>
                            <div class="text-muted">Available</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Call to Action -->
            <section class="bg-primary text-white p-4 p-md-5 rounded-3 text-center">
                <h2 class="h2 mb-3">Ready to Enhance Your Projects?</h2>
                <p class="lead mb-4">Join thousands of creators who trust our free sound effects library</p>
                <a href="{{ route('home') }}" class="btn btn-light btn-lg px-4">
                    <i class="bi bi-collection-play me-2"></i> Browse Sound Library
                </a>
            </section>
        </div>
    </div>
</div>

<!-- Structured Data -->
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "AboutPage",
        "name": "About Sound Effects Free",
        "description": "Learn about our free royalty-free sound effects library",
        "url": "{{ url()->current() }}",
        "publisher": {
            "@type": "Organization",
            "name": "Sound Effects Free",
            "logo": {
                "@type": "ImageObject",
                "url": "{{ asset('images/logo.png') }}"
            }
        },
        "foundingDate": "2023",
        "founders": [{
            "@type": "Person",
            "name": "Sound Effects Free Team"
        }],
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "International"
        }
    }
</script>
@endsection