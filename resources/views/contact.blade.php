@extends('layouts.app')

@section('title', 'Contact Us - Sound Effects Free')
@section('description', 'Get in touch with Sound Effects Free for inquiries, feedback, or support.')

@section('content')
<h1 class="text-3xl font-bold mb-6">Contact Us</h1>

<p>If you have questions, feedback, or need support, please fill out the form below or email us at support@soundeffectssfree.com.</p>

@if(session('success'))
<div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

<form action="{{ route('contact.submit') }}" method="POST" class="mt-6 max-w-lg">
    @csrf
    <div class="mb-4">
        <label for="name" class="block font-medium mb-1">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        @error('name')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="email" class="block font-medium mb-1">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        @error('email')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="message" class="block font-medium mb-1">Message</label>
        <textarea name="message" id="message" rows="5" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('message') }}</textarea>
        @error('message')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">Send Message</button>
</form>
@endsection
