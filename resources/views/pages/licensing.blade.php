@extends('layouts.app')

@section('title', 'Royalty-Free Sound Effects License | Free to Use for All Projects')

@section('description', 'All sound effects on our website are 100% free to use in personal and commercial projects. No attribution required. Read our complete licensing terms.')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Licensing</li>
                </ol>
            </nav>

            <!-- Main Heading -->
            <h1 class="display-5 fw-bold mb-4 text-center">Sound Effects Licensing Terms</h1>

            <!-- Introductory Paragraph -->
            <p class="lead text-center mb-5">
                All sound effects on soundeffectsfree.com are completely free to use in both personal and commercial projects.
                No hidden fees, no subscriptions - just high-quality audio ready for your creative work.
            </p>

            <!-- License Card -->
            <div class="card shadow-sm mb-5">
                <div class="card-body p-4 p-md-5">
                    <!-- Usage Rights Section -->
                    <section class="mb-5">
                        <h2 class="h3 mb-3 fw-bold text-primary">
                            <i class="bi bi-check-circle-fill me-2"></i> Usage Rights
                        </h2>
                        <div class="ps-4">
                            <p>All sound effects available on soundeffectsfree.com are:</p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i> 100% royalty-free</li>
                                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i> Free for commercial use</li>
                                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i> No attribution required (though appreciated)</li>
                                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i> Available in high-quality MP3 format</li>
                                <li><i class="bi bi-check-circle text-success me-2"></i> Safe to use on YouTube, Twitch, podcasts, and other platforms</li>
                            </ul>
                        </div>
                    </section>

                    <!-- Commercial Use Section -->
                    <section class="mb-5">
                        <h2 class="h3 mb-3 fw-bold text-primary">
                            <i class="bi bi-briefcase-fill me-2"></i> Commercial Use
                        </h2>
                        <div class="ps-4">
                            <p>You may use these sound effects in:</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul>
                                        <li>YouTube videos</li>
                                        <li>Podcasts</li>
                                        <li>Mobile apps</li>
                                        <li>Video games</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul>
                                        <li>Films and TV productions</li>
                                        <li>Advertising</li>
                                        <li>Presentations</li>
                                        <li>Any other creative projects</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="alert alert-info mt-3">
                                <i class="bi bi-info-circle-fill me-2"></i> You <strong>cannot</strong> redistribute or sell these sound effects as standalone files.
                            </div>
                        </div>
                    </section>

                    <!-- Attribution Section -->
                    <section class="mb-5">
                        <h2 class="h3 mb-3 fw-bold text-primary">
                            <i class="bi bi-heart-fill me-2"></i> Attribution
                        </h2>
                        <div class="ps-4">
                            <p>While not required, we greatly appreciate attribution when possible. Here's how you can credit us:</p>
                            <div class="card bg-light mb-3">
                                <div class="card-body">
                                    <code>Sound effects from soundeffectsfree.com</code>
                                </div>
                            </div>
                            <p>Or link back to our website in your project description.</p>
                        </div>
                    </section>

                    <!-- Content Creation Section -->
                    <section>
                        <h2 class="h3 mb-3 fw-bold text-primary">
                            <i class="bi bi-robot me-2"></i> About Our Content
                        </h2>
                        <div class="ps-4">
                            <p>All sound effects on this website are:</p>
                            <ul>
                                <li class="mb-2">Created using AI technology</li>
                                <li class="mb-2">Manually curated for quality</li>
                                <li class="mb-2">Regularly updated with new sounds</li>
                                <li>Free from copyright restrictions</li>
                            </ul>
                            <p>We use advanced AI tools to generate unique sound effects that you won't find elsewhere, ensuring your projects stand out.</p>
                        </div>
                    </section>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class="h4 mb-0">Frequently Asked Questions</h2>
                </div>
                <div class="card-body">
                    <div class="accordion" id="licenseFAQ">
                        <!-- FAQ Item 1 -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    Can I use these sounds in my YouTube videos?
                                </button>
                            </h3>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#licenseFAQ">
                                <div class="accordion-body">
                                    Yes! All our sound effects are completely safe to use on YouTube and other video platforms. You won't receive any copyright claims for using our sounds.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    Do I need to pay to use these sounds?
                                </button>
                            </h3>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#licenseFAQ">
                                <div class="accordion-body">
                                    No, all sound effects are completely free to use. We don't charge for downloads or require subscriptions.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    Can I modify the sound effects?
                                </button>
                            </h3>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#licenseFAQ">
                                <div class="accordion-body">
                                    Absolutely! You're free to edit, remix, or combine our sound effects with other audio to create something new.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center mt-5">
                <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-4 me-2">
                    <i class="bi bi-collection-play me-1"></i> Browse Sound Effects
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg px-4">
                    <i class="bi bi-question-circle me-1"></i> Have Questions?
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Structured Data for FAQ SEO -->
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [{
                "@type": "Question",
                "name": "Can I use these sounds in my YouTube videos?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes! All our sound effects are completely safe to use on YouTube and other video platforms. You won't receive any copyright claims for using our sounds."
                }
            },
            {
                "@type": "Question",
                "name": "Do I need to pay to use these sounds?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "No, all sound effects are completely free to use. We don't charge for downloads or require subscriptions."
                }
            },
            {
                "@type": "Question",
                "name": "Can I modify the sound effects?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Absolutely! You're free to edit, remix, or combine our sound effects with other audio to create something new."
                }
            }
        ]
    }
</script>
@endsection