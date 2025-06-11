@extends('layouts.app')
@section('title',$sound->title)
@section('description',Str::limit($sound->description,150))
@section('og_title',$sound->title)
@section('og_type','music.song')
@section('content')
<div class="container my-5">
    <article class="bg-white rounded shadow p-4">
        <h1 class="mb-3">{{ $sound->title }}</h1>

        <p class="mb-4" style="white-space: pre-wrap;">{{ $sound->description }}</p>

        <audio controls class="w-100 mb-4">
            <source src="{{ asset('storage/' . $sound->file_path) }}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>

        <p>
            Category:
            <a href="{{ route('category.show', $sound->category->slug) }}" class="text-primary">
                {{ $sound->category->name }}
            </a>
        </p>

        <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Kembali ke daftar</a>
    </article>
</div>
@endsection