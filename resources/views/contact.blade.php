@extends('layouts.app')

@section('title', 'Contact Us | Free Sound Effects Support & Inquiries')
@section('description', 'Contact our team for questions about royalty-free sound effects, licensing, or technical support. We help creators find perfect audio for videos, games, and podcasts.')

@section('content')
<div class="container py-4">
    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- Main Heading -->
            <h1 class="display-5 fw-bold mb-4">Contact Sound Effects Free</h1>

            <!-- Introductory Text -->
            <p class="lead mb-4">Have questions about our sound effects library? Our team is here to help you with licensing, technical support, or any other inquiries.</p>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card shadow-sm mb-5">
                <div class="card-body p-4 p-md-5">
                    <div class="row">
                        <!-- Contact Form -->
                        <div class="col-md-6">
                            <h2 class="h4 mb-4">Send Us a Message</h2>
                            <form action="{{ route('contact.submit') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <select class="form-select" id="subject" name="subject">
                                        <option value="General Inquiry">General Inquiry</option>
                                        <option value="Technical Support">Technical Support</option>
                                        <option value="Licensing Question">Licensing Question</option>
                                        <option value="Content Submission">Content Submission</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="4" required>{{ old('message') }}</textarea>
                                    @error('message')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bi bi-send-fill me-2"></i> Send Message
                                </button>
                            </form>
                        </div>

                        <!-- Contact Information -->
                        <div class="col-md-6 mt-4 mt-md-0">
                            <h2 class="h4 mb-4">Contact Information</h2>
                            <div class="d-flex align-items-start mb-4">
                                <div class="flex-shrink-0 text-primary">
                                    <i class="bi bi-envelope-fill fs-4"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="h6 mb-1">Email Support</h3>
                                    <p class="mb-0">support@soundeffectsfree.com</p>
                                </div>
                            </div>

                            <!-- <div class="d-flex align-items-start mb-4">
                                <div class="flex-shrink-0 text-primary">
                                    <i class="bi bi-headset fs-4"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="h6 mb-1">Community Forum</h3>
                                    <p class="mb-0"><a href="{{ url('/forum') }}" class="text-decoration-none">Join our creator community</a></p>
                                </div>
                            </div> -->

                            <div class="d-flex align-items-start mb-4">
                                <div class="flex-shrink-0 text-primary">
                                    <i class="bi bi-briefcase-fill fs-4"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="h6 mb-1">Business Inquiries</h3>
                                    <p class="mb-0">partners@soundeffectsfree.com</p>
                                </div>
                            </div>

                            <hr class="my-4">

                            <h3 class="h6 mb-3">Follow Us</h3>
                            <div class="d-flex gap-3">
                                <a href="#" class="text-decoration-none text-muted" aria-label="Facebook">
                                    <i class="bi bi-facebook fs-5"></i>
                                </a>
                                <a href="#" class="text-decoration-none text-muted" aria-label="Twitter">
                                    <i class="bi bi-twitter-x fs-5"></i>
                                </a>
                                <a href="#" class="text-decoration-none text-muted" aria-label="Instagram">
                                    <i class="bi bi-instagram fs-5"></i>
                                </a>
                                <a href="#" class="text-decoration-none text-muted" aria-label="YouTube">
                                    <i class="bi bi-youtube fs-5"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h2 class="h5 mb-0">Frequently Asked Questions</h2>
                </div>
                <div class="card-body">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    How long does it take to get a response?
                                </button>
                            </h3>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We typically respond to inquiries within 24-48 hours during business days.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    Can I request specific sound effects?
                                </button>
                            </h3>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes! We welcome suggestions for new sound effects to add to our library.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Structured Data for Contact Page -->
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ContactPage",
        "name": "Contact Sound Effects Free",
        "description": "Contact page for royalty-free sound effects library",
        "url": "{{ url()->current() }}",
        "potentialAction": {
            "@type": "ContactPoint",
            "contactType": "customer support",
            "email": "support@soundeffectsfree.com",
            "url": "{{ url('/contact') }}",
            "availableLanguage": ["English"]
        }
    }
</script>
@endsection