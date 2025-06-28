@extends('layouts.app')

@section('title', 'Page Not Found')

@section('content')
<div class="container text-center py-4">
    <img src="{{ asset('images/Oops! 404 Error with a broken robot-pana.svg') }}"
        alt="Page Not Found"
        class="img-fluid mb-3"
        style="max-width: 250px;">

    <h2 class="text-danger">404</h2>
    <p class="text-muted mb-3" style="font-size: 0.95rem;">
        Page not found. It might have been removed or doesn't exist.
    </p>

    <a href="{{ url('/') }}" class="btn btn-sm btn-outline-primary">
        ← Back to Homepage
    </a>
</div>
@endsection