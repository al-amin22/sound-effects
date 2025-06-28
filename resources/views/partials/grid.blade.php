@extends('layouts.app')

@section('title', 'Free Sound Effects')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Sound Effects Library</h1>

    <div class="row mb-4">
        <div class="col-md-8">
            <form action="{{ route('home') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search sound effects..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <select class="form-select" id="category-filter">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        @forelse($soundEffects as $sound)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <!-- <img src="{{ asset($sound->image_path) }}" class="card-img-top" alt="{{ $sound->title }}"> -->
                <div class="card-body">
                    <h5 class="card-title">{{ $sound->title }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($sound->description, 100) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-secondary">{{ $sound->category->name }}</span>
                        <small class="text-muted">{{ $sound->duration }}s</small>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <audio controls class="w-100 mb-2">
                        <source src="{{ asset($sound->audio_path) }}" type="audio/mpeg">
                    </audio>
                    <a href="{{ route('sounds.show', $sound->slug) }}" class="btn btn-sm btn-outline-primary">View Details</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">No sound effects found.</div>
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center">
        {{ $soundEffects->links() }}
    </div>
</div>

<script>
    document.getElementById('category-filter').addEventListener('change', function() {
        const category = this.value;
        const url = new URL(window.location.href);

        if (category) {
            url.searchParams.set('category', category);
        } else {
            url.searchParams.delete('category');
        }

        window.location.href = url.toString();
    });
</script>
@endsection