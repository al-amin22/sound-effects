@extends('layouts.app')

@section('title', 'Sound Effect Packs Collection')
@section('description', 'Browse our collection of professionally curated sound effect packs. Download high-quality SFX packs for your projects.')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="mb-3">Sound Effect Packs</h1>

            <!-- Search and Filters -->
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('sound-packs.search') }}" method="GET">
                        <div class="input-group">
                            <input type="text"
                                name="q"
                                class="form-control"
                                placeholder="Search sound packs..."
                                value="{{ $searchTerm ?? '' }}">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                    </form>

                    <div class="d-flex flex-wrap gap-2 mt-3">
                        <a href="{{ route('sound-packs.index') }}"
                            class="btn btn-sm btn-outline-secondary {{ !isset($currentCountry) && !isset($currentCategory) ? 'active' : '' }}">
                            All Packs
                        </a>

                        @foreach(['US', 'UK', 'JP', 'DE'] as $country)
                        <a href="{{ route('sound-packs.country', $country) }}"
                            class="btn btn-sm btn-outline-secondary {{ isset($currentCountry) && $currentCountry == $country ? 'active' : '' }}">
                            {{ $country }}
                        </a>
                        @endforeach

                        @foreach($categories as $category)
                        <a href="{{ route('sound-packs.category', $category->slug) }}"
                            class="btn btn-sm btn-outline-secondary {{ isset($currentCategory) && $currentCategory->id == $category->id ? 'active' : '' }}">
                            {{ $category->name }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sound Packs Grid -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @forelse($soundPacks as $pack)
        <div class="col">
            <div class="card h-100 sound-pack-card">
                <a href="{{ route('sound-packs.show', Str::after($pack->slug, 'sound-packs/')) }}" class="text-decoration-none">
                    <div class="ratio ratio-16x9 bg-light">
                        @if($pack->sounds->first() && $pack->sounds->first()->image_path)
                        <img src="{{ asset($pack->sounds->first()->image_path) }}"
                            class="card-img-top object-fit-cover"
                            alt="{{ $pack->name }} sound pack thumbnail">
                        @else
                        <div class="d-flex align-items-center justify-content-center text-muted">
                            <i class="fas fa-music fa-3x"></i>
                        </div>
                        @endif
                    </div>
                </a>
                <div class="card-body">
                    <h2 class="h5 card-title mb-1">
                        <a href="{{ route('sound-packs.show', Str::after($pack->slug, 'sound-packs/')) }}"
                            class="text-decoration-none text-dark">
                            {{ $pack->name }}
                        </a>
                    </h2>
                    <div class="d-flex align-items-center mb-2">
                        <span class="badge bg-primary me-2">{{ $pack->category->name }}</span>
                        <span class="badge bg-secondary">{{ $pack->country }}</span>
                    </div>
                    <p class="card-text text-muted small">{{ Str::limit($pack->description, 100) }}</p>
                </div>
                <div class="card-footer bg-white border-top-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">{{ $pack->sounds_count }} sounds</small>
                        <a href="{{ route('sound-packs.show', Str::after($pack->slug, 'sound-packs/')) }}"
                            class="btn btn-sm btn-primary">
                            View Pack
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">No sound packs found. Please check back later.</div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($soundPacks->hasPages())
    <div class="row mt-4">
        <div class="col-12">
            {{ $soundPacks->links() }}
        </div>
    </div>
    @endif
</div>
@endsection

@section('styles')
<style>
    .sound-pack-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .sound-pack-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .object-fit-cover {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    @media (max-width: 767.98px) {
        .list-group-item {
            padding: 1rem;
        }
    }
</style>
@endsection