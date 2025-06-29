@extends('layouts.app')
@section('title', 'Privacy Policy - Free Sound Effects | soundeffectsfree.com')
@section('description', 'Privacy policy for soundeffectsfree.com. We share free AI-generated sound effects from multiple platforms while respecting your privacy.')

@section('content')
<div class="container py-4 py-lg-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
                </ol>
            </nav>

            <!-- Main Header -->
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bold mb-3">Privacy Policy</h1>
                <p class="lead text-muted">Last updated: {{ date('F j, Y') }}</p>
            </div>

            <!-- Policy Content -->
            <div class="card shadow-sm mb-5">
                <div class="card-body p-4 p-md-5">
                    <div class="policy-content">
                        <section class="mb-5">
                            <p class="mb-4">At <strong>soundeffectsfree.com</strong>, we provide a curated collection of AI-generated sound effects sourced from various platforms. We're committed to protecting your privacy while offering these free resources.</p>

                            <div class="alert alert-info d-flex align-items-center">
                                <i class="bi bi-info-circle-fill me-3 fs-4"></i>
                                <div>
                                    <strong>Important:</strong> All sound effects on our site are AI-generated and collected from multiple sources. We do not claim ownership of the original generated content.
                                </div>
                            </div>
                        </section>

                        <section class="mb-5">
                            <h2 class="h4 fw-bold mb-4 pb-2 border-bottom">1. About Our Sound Effects</h2>
                            <p>Our sound library consists of:</p>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex mb-3">
                                    <i class="bi bi-robot me-3 mt-1 text-primary"></i>
                                    <div>
                                        <strong>AI-Generated Content:</strong> All sounds are created using various AI platforms and tools
                                    </div>
                                </li>
                                <li class="d-flex mb-3">
                                    <i class="bi bi-collection me-3 mt-1 text-primary"></i>
                                    <div>
                                        <strong>Curated Collection:</strong> We gather, categorize, and share these sounds for easy access
                                    </div>
                                </li>
                                <li class="d-flex">
                                    <i class="bi bi-share me-3 mt-1 text-primary"></i>
                                    <div>
                                        <strong>Free Distribution:</strong> We provide these sounds under our free license terms
                                    </div>
                                </li>
                            </ul>
                        </section>

                        <section class="mb-5">
                            <h2 class="h4 fw-bold mb-4 pb-2 border-bottom">2. Information We Collect</h2>
                            <p>To maintain our free service, we collect minimal data:</p>
                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <div class="h-100 p-4 bg-light rounded">
                                        <h3 class="h5 fw-bold mb-3"><i class="bi bi-database me-2 text-primary"></i> Collected Data</h3>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2"><i class="bi bi-dot me-1"></i> Browser information</li>
                                            <li class="mb-2"><i class="bi bi-dot me-1"></i> Download statistics</li>
                                            <li><i class="bi bi-dot me-1"></i> Popular search terms</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="h-100 p-4 bg-light rounded">
                                        <h3 class="h5 fw-bold mb-3"><i class="bi bi-database-dash me-2 text-primary"></i> Never Collected</h3>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2"><i class="bi bi-dot me-1"></i> Personal information</li>
                                            <li class="mb-2"><i class="bi bi-dot me-1"></i> Payment details</li>
                                            <li><i class="bi bi-dot me-1"></i> User accounts</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="mb-5">
                            <h2 class="h4 fw-bold mb-4 pb-2 border-bottom">3. AI Content Generation</h2>
                            <div class="d-flex align-items-start mb-4">
                                <i class="bi bi-cpu me-3 mt-1 fs-4 text-primary"></i>
                                <div>
                                    <p>Our sound effects are sourced from multiple AI platforms:</p>
                                    <ul>
                                        <li>We utilize various AI sound generation tools</li>
                                        <li>Sounds are processed for quality and categorized</li>
                                        <li>Original generation parameters are not stored</li>
                                        <li>We don't track which sounds individual users download</li>
                                    </ul>
                                </div>
                            </div>
                        </section>

                        <section class="mb-5">
                            <h2 class="h4 fw-bold mb-4 pb-2 border-bottom">4. Data Usage</h2>
                            <div class="table-responsive mb-4">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Purpose</th>
                                            <th>Data Used</th>
                                            <th>Retention</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Service Improvement</td>
                                            <td>Aggregate download stats</td>
                                            <td>1 year</td>
                                        </tr>
                                        <tr>
                                            <td>Content Curation</td>
                                            <td>Popular search terms</td>
                                            <td>6 months</td>
                                        </tr>
                                        <tr>
                                            <td>Technical Maintenance</td>
                                            <td>Error logs</td>
                                            <td>30 days</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>

                        <section class="mb-5">
                            <h2 class="h4 fw-bold mb-4 pb-2 border-bottom">5. Your Rights</h2>
                            <div class="row g-3 text-center">
                                <div class="col-6 col-md-3">
                                    <div class="p-3 border rounded h-100">
                                        <i class="bi bi-eye-fill fs-3 text-primary mb-2"></i>
                                        <h3 class="h6 fw-bold">Access</h3>
                                        <p class="small mb-0">Request data we have</p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="p-3 border rounded h-100">
                                        <i class="bi bi-trash-fill fs-3 text-primary mb-2"></i>
                                        <h3 class="h6 fw-bold">Delete</h3>
                                        <p class="small mb-0">Remove your data</p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="p-3 border rounded h-100">
                                        <i class="bi bi-download-fill fs-3 text-primary mb-2"></i>
                                        <h3 class="h6 fw-bold">Export</h3>
                                        <p class="small mb-0">Get your data</p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="p-3 border rounded h-100">
                                        <i class="bi bi-question-circle-fill fs-3 text-primary mb-2"></i>
                                        <h3 class="h6 fw-bold">Inquire</h3>
                                        <p class="small mb-0">Ask about data use</p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="mb-5">
                            <h2 class="h4 fw-bold mb-4 pb-2 border-bottom">6. Changes to Policy</h2>
                            <p>We may update this policy as our collection methods evolve. Significant changes will be noted on our website.</p>
                        </section>

                        <section>
                            <h2 class="h4 fw-bold mb-4 pb-2 border-bottom">7. Contact</h2>
                            <p>For questions about our AI sound collection or privacy practices, please <a href="{{ route('contact') }}" class="text-decoration-none">contact us</a>.</p>
                        </section>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="text-center p-4 p-md-5 bg-primary bg-opacity-10 rounded-3 mb-5">
                <h2 class="h4 fw-bold mb-3">Explore Our AI-Generated Sound Library</h2>
                <p class="mb-4">Thousands of free sound effects, carefully curated from multiple AI sources</p>
                <a href="{{ route('home') }}" class="btn btn-primary px-4">
                    <i class="bi bi-collection-play me-2"></i> Browse Sounds
                </a>
            </div>
        </div>
    </div>
</div>
@endsection