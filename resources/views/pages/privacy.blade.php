@extends('layouts.app')
@section('title', 'Privacy Policy - Sound Effects Studio')
@section('description', 'Learn how Sound Effects Studio collects, uses, and protects your personal data while providing free sound effects.')

@section('content')
<h1 class="text-3xl font-bold mb-6">Privacy Policy</h1>

<p>At Sound Effects Studio, your privacy is our top priority. This Privacy Policy explains how we collect, use, and protect your personal information when you visit and use our website.</p>

<h2 class="text-xl font-semibold mt-6 mb-2">Information We Collect</h2>
<p>We do not require you to create an account or provide personal details to download or listen to our sound effects. However, like many websites, we may automatically collect certain non-personal information such as:</p>
<ul class="list-disc list-inside mb-4">
    <li>Browser type and version</li>
    <li>IP address</li>
    <li>Pages visited and time spent on the site</li>
    <li>Referring websites</li>
</ul>

<h2 class="text-xl font-semibold mt-6 mb-2">Use of Cookies and Tracking</h2>
<p>We use minimal cookies strictly necessary for the website to function properly. These help improve user experience but do not collect personal data. We do not use third-party trackers or advertising cookies.</p>

<h2 class="text-xl font-semibold mt-6 mb-2">How We Use Your Information</h2>
<p>The information we collect is used solely to analyze site usage and improve our services. We do not sell, rent, or share your data with third parties.</p>

<h2 class="text-xl font-semibold mt-6 mb-2">Third-Party Services</h2>
<p>Our website may contain links to third-party services for analytics or social media. These services have their own privacy policies, and we encourage you to review them separately.</p>

<h2 class="text-xl font-semibold mt-6 mb-2">Security</h2>
<p>We implement industry-standard security measures to protect our website and user data from unauthorized access or disclosure. However, please be aware that no method of transmission over the internet is 100% secure.</p>

<h2 class="text-xl font-semibold mt-6 mb-2">Children’s Privacy</h2>
<p>Our website is not directed at children under 13 years old. We do not knowingly collect personal data from children.</p>

<h2 class="text-xl font-semibold mt-6 mb-2">Your Rights</h2>
<p>You have the right to request access, correction, or deletion of any personal data we may hold about you. Since we collect minimal data, please contact us if you have concerns about your privacy.</p>

<h2 class="text-xl font-semibold mt-6 mb-2">Changes to This Policy</h2>
<p>We may update this Privacy Policy occasionally to reflect changes in our practices or legal requirements. We encourage you to review it periodically.</p>

<h2 class="text-xl font-semibold mt-6 mb-2">Contact Us</h2>
<p>If you have any questions or concerns about this Privacy Policy, please <a href="{{ route('contact') }}" class="text-blue-600 hover:underline">contact us</a>.</p>

@endsection
