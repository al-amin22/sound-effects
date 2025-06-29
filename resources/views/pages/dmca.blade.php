@extends('layouts.app')

@section('title', 'DMCA Policy | Copyright Notice for SoundEffectsFree.com')

@section('description', 'DMCA policy and copyright notice for SoundEffectsFree.com. All sound effects are AI-generated and free to use. Report copyright concerns using our DMCA process.')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">DMCA Policy</li>
                </ol>
            </nav>

            <!-- Main Heading -->
            <h1 class="display-5 fw-bold mb-4">DMCA Policy & Copyright Notice</h1>

            <!-- Introductory Paragraph -->
            <div class="alert alert-info mb-5">
                <i class="bi bi-info-circle-fill me-2"></i>
                <strong>Important:</strong> All sound effects on SoundEffectsFree.com are generated using AI technology and are provided as royalty-free content. However, we respect intellectual property rights and comply with the DMCA.
            </div>

            <!-- Policy Card -->
            <div class="card shadow-sm mb-5">
                <div class="card-header bg-primary text-white">
                    <h2 class="h4 mb-0">Digital Millennium Copyright Act (DMCA) Policy</h2>
                </div>
                <div class="card-body p-4 p-md-5">
                    <!-- Section 1 -->
                    <section class="mb-5">
                        <h2 class="h3 mb-3 fw-bold">1. About Our Content</h2>
                        <p>SoundEffectsFree.com provides AI-generated sound effects that are:</p>
                        <ul>
                            <li class="mb-2">Created using artificial intelligence tools</li>
                            <li class="mb-2">Not copied from copyrighted sources</li>
                            <li class="mb-2">Free for personal and commercial use</li>
                            <li>Published under our <a href="{{ route('licensing') }}">Royalty-Free License</a></li>
                        </ul>
                    </section>

                    <!-- Section 2 -->
                    <section class="mb-5">
                        <h2 class="h3 mb-3 fw-bold">2. Copyright Infringement Claims</h2>
                        <p>If you believe any content on our website infringes your copyright, please submit a DMCA notice containing:</p>
                        <ol>
                            <li class="mb-2">Your contact information (name, address, phone, email)</li>
                            <li class="mb-2">Identification of the copyrighted work claimed to be infringed</li>
                            <li class="mb-2">Exact URL of the allegedly infringing content</li>
                            <li class="mb-2">Statement that you have a good faith belief the use is unauthorized</li>
                            <li class="mb-2">Statement that the information is accurate under penalty of perjury</li>
                            <li>Your physical or electronic signature</li>
                        </ol>
                        <div class="alert alert-warning mt-3">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <strong>Note:</strong> Misrepresentations may result in liability for damages under Section 512(f) of the DMCA.
                        </div>
                    </section>

                    <!-- Section 3 -->
                    <section class="mb-5">
                        <h2 class="h3 mb-3 fw-bold">3. Counter-Notification Process</h2>
                        <p>If your content was removed due to a DMCA notice and you believe it was a mistake, you may submit a counter-notification containing:</p>
                        <ul>
                            <li class="mb-2">Identification of the removed content</li>
                            <li class="mb-2">Your contact information</li>
                            <li class="mb-2">Statement under penalty of perjury that the removal was mistaken</li>
                            <li class="mb-2">Consent to jurisdiction in your district (for US residents) or consent to jurisdiction in California (for international users)</li>
                            <li>Your physical or electronic signature</li>
                        </ul>
                    </section>

                    <!-- Section 4 -->
                    <section>
                        <h2 class="h3 mb-3 fw-bold">4. How to Submit Notices</h2>
                        <p>Please send all DMCA notices and counter-notices to our designated agent:</p>
                        <div class="card bg-light mb-3">
                            <div class="card-body">
                                <h3 class="h5">DMCA Agent</h3>
                                <p class="mb-1"><strong>Name:</strong> Copyright Officer</p>
                                <p class="mb-1"><strong>Email:</strong> dmca@soundeffectsfree.com</p>
                                <p class="mb-0"><strong>Phone:</strong> +1 (555) 123-4567</p>
                            </div>
                        </div>
                        <p>We typically respond to valid notices within 2-3 business days.</p>
                    </section>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="card shadow-sm mb-5">
                <div class="card-header bg-primary text-white">
                    <h2 class="h4 mb-0">DMCA Frequently Asked Questions</h2>
                </div>
                <div class="card-body">
                    <div class="accordion" id="dmcaFAQ">
                        <!-- FAQ 1 -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeadingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne">
                                    Are AI-generated sound effects copyrighted?
                                </button>
                            </h3>
                            <div id="faqCollapseOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne" data-bs-parent="#dmcaFAQ">
                                <div class="accordion-body">
                                    <p>According to current U.S. Copyright Office guidance, AI-generated content without human authorship cannot be copyrighted. However, we maintain all rights to the collection and presentation of sounds on our website.</p>
                                    <p class="mb-0">Our AI tools are carefully designed to produce original sound effects that don't infringe on existing copyrighted works.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeadingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo">
                                    What happens after I submit a DMCA notice?
                                </button>
                            </h3>
                            <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#dmcaFAQ">
                                <div class="accordion-body">
                                    <p>Our process includes:</p>
                                    <ol>
                                        <li class="mb-2">Reviewing the notice for completeness</li>
                                        <li class="mb-2">Temporarily disabling access to the disputed content</li>
                                        <li class="mb-2">Notifying the uploader (if applicable)</li>
                                        <li>Taking appropriate action based on our findings</li>
                                    </ol>
                                    <p class="mb-0">We comply with all DMCA requirements for service providers.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeadingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseThree">
                                    Do you track users who upload infringing content?
                                </button>
                            </h3>
                            <div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#dmcaFAQ">
                                <div class="accordion-body">
                                    <p>For user-uploaded content (if applicable), we:</p>
                                    <ul>
                                        <li class="mb-2">Maintain records of DMCA violations</li>
                                        <li class="mb-2">May terminate repeat infringers' accounts</li>
                                        <li>Reserve the right to pursue legal action for willful infringement</li>
                                    </ul>
                                    <p class="mb-0">However, since most content on our site is AI-generated by us, typical copyright infringement is unlikely.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Resources -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class="h4 mb-0">Additional Resources</h2>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <a href="https://www.copyright.gov/dmca/" target="_blank" rel="noopener noreferrer" class="text-decoration-none d-flex align-items-center">
                                <i class="bi bi-box-arrow-up-right me-2"></i>
                                U.S. Copyright Office DMCA Information
                            </a>
                        </li>
                        <li class="mb-3">
                            <a href="{{ route('licensing') }}" class="text-decoration-none d-flex align-items-center">
                                <i class="bi bi-file-earmark-text me-2"></i>
                                Our Sound Effects Licensing Terms
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('privacy') }}" class="text-decoration-none d-flex align-items-center">
                                <i class="bi bi-shield-lock me-2"></i>
                                Privacy Policy
                            </a>
                        </li>
                    </ul>
                </div>
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
                "name": "Are AI-generated sound effects copyrighted?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "According to current U.S. Copyright Office guidance, AI-generated content without human authorship cannot be copyrighted. However, we maintain all rights to the collection and presentation of sounds on our website. Our AI tools are carefully designed to produce original sound effects that don't infringe on existing copyrighted works."
                }
            },
            {
                "@type": "Question",
                "name": "What happens after I submit a DMCA notice?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Our process includes: 1) Reviewing the notice for completeness, 2) Temporarily disabling access to the disputed content, 3) Notifying the uploader (if applicable), and 4) Taking appropriate action based on our findings. We comply with all DMCA requirements for service providers."
                }
            },
            {
                "@type": "Question",
                "name": "Do you track users who upload infringing content?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "For user-uploaded content (if applicable), we: maintain records of DMCA violations, may terminate repeat infringers' accounts, and reserve the right to pursue legal action for willful infringement. However, since most content on our site is AI-generated by us, typical copyright infringement is unlikely."
                }
            }
        ]
    }
</script>
@endsection