@extends('layouts.app')
@section('title',$sound->title)
@section('description',Str::limit($sound->description,150))
@section('og_title',$sound->title)
@section('og_type','music.song')
@section('content')
<h1>{{ $sound->title }}</h1>
<p>{{ $sound->description }}</p>
<audio controls src="{{ asset('storage/'.$sound->file_path) }}" class="w-full mt-4"></audio>
<p class="mt-2">Kategori: <a href="{{ route('category.show',$sound->category->slug) }}">{{ $sound->category->name }}</a></p>
@endsection
