@extends('layouts.app')
@section('title', 'Terms of Use - Sound Effects Studio')
@section('description', 'Read the terms and conditions for using Sound Effects Studio’s free sound effects.')

@section('content')
<h1 class="text-3xl font-bold mb-6">Terms of Use</h1>

<p>Welcome to Sound Effects Studio. By accessing or using our website and downloading our sound effects, you agree to comply with the following terms and conditions:</p>

<h2 class="text-xl font-semibold mt-6 mb-2">1. License to Use</h2>
<p>All sound effects provided on this website are <strong>free for personal and commercial use</strong>, unless otherwise stated. You may download, modify, and incorporate them into your projects without attribution.</p>

<h2 class="text-xl font-semibold mt-6 mb-2">2. Restrictions</h2>
<ul class="list-disc list-inside mb-4">
    <li>You may not redistribute, sell, or sublicense the original sound files as standalone products.</li>
    <li>Reselling or claiming the sounds as your own is prohibited.</li>
    <li>Some sounds may have additional restrictions; please check individual descriptions.</li>
</ul>

<h2 class="text-xl font-semibold mt-6 mb-2">3. No Warranty</h2>
<p>Sound Effects Studio provides all sounds “as is” without any guarantees or warranties regarding accuracy, legality, or fitness for a particular purpose.</p>

<h2 class="text-xl font-semibold mt-6 mb-2">4. Limitation of Liability</h2>
<p>We are not liable for any damages arising from the use or inability to use our sounds or website.</p>

<h2 class="text-xl font-semibold mt-6 mb-2">5. Changes to Terms</h2>
<p>We reserve the right to update or modify these terms at any time without prior notice. Continued use of the site indicates acceptance of the new terms.</p>

<h2 class="text-xl font-semibold mt-6 mb-2">6. Governing Law</h2>
<p>These terms are governed by the laws applicable in the jurisdiction where Sound Effects Studio operates.</p>

<h2 class="text-xl font-semibold mt-6 mb-2">Contact</h2>
<p>If you have questions about these terms, please <a href="{{ route('contact') }}" class="text-blue-600 hover:underline">contact us</a>.</p>

@endsection