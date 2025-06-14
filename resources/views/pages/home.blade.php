@extends('layouts.app')
@section('title', 'Free Sound Effects')
@section('keywords', 'free sound effects, royalty free sound effects, sound effects download, audio effects, video editing sounds, game sounds, sound library, free SFX 2025')
@section('description', 'Download and listen to royalty-free sound effects for your creative projects.')

@section('content')
<h1 class="text-3xl font-bold mb-4">Free Sound Effects</h1>
<p class="mb-6">
    Explore and download <strong>100% free sound effects</strong> for your videos, games, and projects. No sign-up or payment required — use them royalty-free!
</p>
<a href="{{ url('/collection') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Explore Collection</a>
@endsection