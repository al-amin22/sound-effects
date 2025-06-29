@extends('layouts.app')
@section('title', 'Privacy Policy - Sound Effects Free | soundeffectsfree.com')
@section('description', 'Read our privacy policy for soundeffectsfree.com. We respect your privacy while providing free AI-generated sound effects for videos, games, and creative projects.')

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
                            <p class="mb-4">At <strong>soundeffectsfree.com</strong>, we're committed to protecting your privacy while providing free, high-quality AI-generated sound effects. This policy explains how we handle your information when you use our website.</p>

                            <div class="alert alert-info d-flex align-items-center">
                                <i class="bi bi-info-circle-fill me-3 fs-4"></i>
                                <div>
                                    <strong>Key Point:</strong> You can download all our sound effects without creating an account or providing personal information.
                                </div>
                            </div>
                        </section>

                        <section class="mb-5">
                            <h2 class="h4 fw-bold mb-4 pb-2 border-bottom">1. Information We Collect</h2>
                            <p>We minimize data collection to provide our service:</p>
                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <div class="h-100 p-4 bg-light rounded">
                                        <h3 class="h5 fw-bold mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i> What we collect</h3>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2"><i class="bi bi-dot me-1"></i> Browser type & version</li>
                                            <li class="mb-2"><i class="bi bi-dot me-1"></i> Anonymous usage statistics</li>
                                            <li><i class="bi bi-dot me-1"></i> Download counts (not tied to users)</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="h-100 p-4 bg-light rounded">
                                        <h3 class="h5 fw-bold mb-3"><i class="bi bi-x-circle-fill text-danger me-2"></i> What we don't collect</h3>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2"><i class="bi bi-dot me-1"></i> Personal identifiers</li>
                                            <li class="mb-2"><i class="bi bi-dot me-1"></i> Email addresses</li>
                                            <li><i class="bi bi-dot me-1"></i> Payment information</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="mb-5">
                            <h2 class="h4 fw-bold mb-4 pb-2 border-bottom">2. AI Sound Generation</h2>
                            <p>Our sound effects are generated using machine learning:</p>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex mb-2">
                                    <i class="bi bi-robot me-3 mt-1 text-primary"></i>
                                    <div>Search terms may be used to improve our AI models, but aren't linked to individual users</div>
                                </li>
                                <li class="d-flex mb-2">
                                    <i class="bi bi-music-note-beamed me-3 mt-1 text-primary"></i>
                                    <div>Generated sounds are stored anonymously in our library for all users</div>
                                </li>
                                <li class="d-flex">
                                    <i class="bi bi-shield-lock me-3 mt-1 text-primary"></i>
                                    <div>No audio you generate is personally associated with you</div>
                                </li>
                            </ul>
                        </section>

                        <section class="mb-5">
                            <h2 class="h4 fw-bold mb-4 pb-2 border-bottom">3. Cookies & Tracking</h2>
                            <div class="table-responsive mb-4">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Type</th>
                                            <th>Purpose</th>
                                            <th>Data Stored</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Essential Cookies</td>
                                            <td>Site functionality</td>
                                            <td>Session ID</td>
                                        </tr>
                                        <tr>
                                            <td>Analytics</td>
                                            <td>Improve service</td>
                                            <td>Anonymous usage data</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p>We <strong>do not</strong> use advertising cookies or third-party trackers.</p>
                        </section>

                        <section class="mb-5">
                            <h2 class="h4 fw-bold mb-4 pb-2 border-bottom">4. Data Security</h2>
                            <div class="d-flex align-items-start mb-4">
                                <i class="bi bi-shield-check text-success me-3 fs-4"></i>
                                <div>
                                    <p>We implement security measures including:</p>
                                    <ul>
                                        <li>HTTPS encryption on all pages</li>
                                        <li>Regular security audits</li>
                                        <li>Minimal data retention policies</li>
                                    </ul>
                                </div>
                            </div>
                        </section>

                        <section class="mb-5">
                            <h2 class="h4 fw-bold mb-4 pb-2 border-bottom">5. Your Rights</h2>
                            <div class="row g-4 text-center">
                                <div class="col-6 col-md-3">
                                    <div class="p-3 border rounded h-100">
                                        <i class="bi bi-eye-fill fs-3 text-primary mb-2"></i>
                                        <h3 class="h6 fw-bold">Access</h3>
                                        <p class="small mb-0">Request your data</p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="p-3 border rounded h-100">
                                        <i class="bi bi-pencil-fill fs-3 text-primary mb-2"></i>
                                        <h3 class="h6 fw-bold">Correct</h3>
                                        <p class="small mb-0">Update information</p>
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
                            </div>
                        </section>

                        <section class="mb-5">
                            <h2 class="h4 fw-bold mb-4 pb-2 border-bottom">6. Changes to This Policy</h2>
                            <p>We may update this policy occasionally. Significant changes will be announced on our website. The "Last updated" date at the top indicates when revisions were made.</p>
                        </section>

                        <section>
                            <h2 class="h4 fw-bold mb-4 pb-2 border-bottom">7. Contact Us</h2>
                            <p>For privacy questions or data requests, please <a href="{{ route('contact') }}" class="text-decoration-none">contact us</a>. We typically respond within 2 business days.</p>
                        </section>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="text-center p-4 p-md-5 bg-primary bg-opacity-10 rounded-3 mb-5">
                <h2 class="h4 fw-bold mb-3">Enjoy our free sound effects with peace of mind</h2>
                <p class="mb-4">Download high-quality AI-generated sounds without compromising your privacy.</p>
                <a href="{{ route('home') }}" class="btn btn-primary px-4">
                    <i class="bi bi-collection-play me-2"></i> Browse Sound Library
                </a>
            </div>
        </div>
    </div>
</div>
@endsection