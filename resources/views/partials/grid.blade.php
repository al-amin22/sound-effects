@extends('layouts.app')

@section('title', 'Free Sound Effects - Browse by Category')
@section('description', 'Discover thousands of free sound effects organized by categories. Find the perfect sound for your project.')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="mb-3">Sound Effects Library</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    @if(request('category'))
                    <li class="breadcrumb-item active" aria-current="page">{{ $categories->firstWhere('slug', request('category'))->name ?? 'Category' }}</li>
                    @else
                    <li class="breadcrumb-item active" aria-current="page">All Sounds</li>
                    @endif
                </ol>
            </nav>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-8">
            <form action="{{ route('home') }}" method="GET" class="search-form">
                <div class="input-group shadow-sm">
                    <input type="text" name="search" class="form-control border-primary" placeholder="Search sound effects..." value="{{ request('search') }}" aria-label="Search sound effects">
                    <!-- <input type="hidden" name="category" value="{{ request('category') }}"> -->
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-4 mt-3 mt-md-0">
            <div class="dropdown">
                <button class="btn btn-outline-secondary w-100 dropdown-toggle" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(request('category'))
                    {{ $categories->firstWhere('slug', request('category'))->name }}
                    @else
                    All Categories
                    @endif
                </button>
                <ul class="dropdown-menu w-100" aria-labelledby="categoryDropdown">
                    <li><a class="dropdown-item {{ !request('category') ? 'active' : '' }}" href="{{ route('home', ['search' => request('search')]) }}">All Categories</a></li>
                    @foreach($categories as $category)
                    <li>
                        <a class="dropdown-item {{ request('category') == $category->slug ? 'active' : '' }}"
                            href="{{ route('home', ['category' => $category->slug, 'search' => request('search')]) }}">
                            {{ $category->name }} <span class="badge bg-primary float-end">{{ $category->sound_effects_count }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    @if(request('category'))
    <div class="row mb-4">
        <div class="col-12">
            <div class="category-header bg-light p-3 rounded">
                <h2 class="h4 mb-0">
                    <i class="fas fa-tag me-2"></i>
                    {{ $categories->firstWhere('slug', request('category'))->name }} Sounds
                    <small class="text-muted">({{ $soundEffects->total() }} results)</small>
                </h2>
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        @forelse($soundEffects as $sound)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 card-title mb-2">
                            <a href="{{ route('sounds.show', $sound->slug) }}" class="text-decoration-none">{{ $sound->title }}</a>
                        </h2>
                        <span class="badge bg-secondary ms-2">{{ $sound->duration }}s</span>
                    </div>
                    <p class="card-text text-muted small">{{ Str::limit($sound->description, 100) }}</p>
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <a href="{{ route('home', ['category' => $sound->category->slug]) }}" class="badge bg-primary text-decoration-none">
                            {{ $sound->category->name }}
                        </a>
                        <small class="text-muted">{{ $sound->downloads_count }} downloads</small>
                    </div>
                </div>
                <div class="card-footer bg-white border-top-0">
                    <audio controls class="w-100 mb-2" preload="none" style="height: 40px;">
                        <source src="{{ asset($sound->audio_path) }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                    <div class="d-grid">
                        <a href="{{ route('sounds.show', $sound->slug) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-info-circle me-1"></i> Details & Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center py-4">
                <i class="fas fa-info-circle fa-2x mb-3"></i>
                <h3 class="h4">No sound effects found</h3>
                <p class="mb-0">
                    @if(request('search') || request('category'))
                    Try adjusting your search or filter criteria
                    @else
                    We're currently adding new sounds. Check back soon!
                    @endif
                </p>
            </div>
        </div>
        @endforelse
    </div>

    @if($soundEffects->hasPages())
    <div class="row mt-4">
        <div class="col-12">
            <nav aria-label="Sound effects pagination" class="d-flex justify-content-center">
                <ul class="pagination">
                    {{-- Previous Button --}}
                    <li class="page-item {{ $soundEffects->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $soundEffects->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    {{-- Page Numbers --}}
                    @foreach ($soundEffects->getUrlRange(max(1, $soundEffects->currentPage() - 2), min($soundEffects->lastPage(), $soundEffects->currentPage() + 2)) as $page => $url)
                    <li class="page-item {{ $page == $soundEffects->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                    @endforeach

                    {{-- Next Button --}}
                    <li class="page-item {{ !$soundEffects->hasMorePages() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $soundEffects->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    @endif
</div>

<style>
    .card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .card-title a {
        color: #2d3748;
        transition: color 0.2s ease;
    }

    .card-title a:hover {
        color: #4299e1;
        text-decoration: underline;
    }

    .pagination {
        --pagination-color: #4a5568;
        --pagination-bg: #fff;
        --pagination-active-color: #fff;
        --pagination-active-bg: #4299e1;
        --pagination-hover-color: #2c5282;
        --pagination-hover-bg: #ebf8ff;
        --pagination-border-radius: 0.375rem;
        --pagination-border-width: 1px;
        --pagination-border-color: #e2e8f0;
    }

    .page-item {
        margin: 0 2px;
    }

    .page-link {
        color: var(--pagination-color);
        background-color: var(--pagination-bg);
        border: var(--pagination-border-width) solid var(--pagination-border-color);
        border-radius: var(--pagination-border-radius);
        padding: 0.5rem 0.75rem;
        min-width: 40px;
        text-align: center;
        transition: all 0.2s ease;
    }

    .page-link:hover {
        color: var(--pagination-hover-color);
        background-color: var(--pagination-hover-bg);
        border-color: var(--pagination-border-color);
    }

    .page-item.active .page-link {
        color: var(--pagination-active-color);
        background-color: var(--pagination-active-bg);
        border-color: var(--pagination-active-bg);
    }

    .page-item.disabled .page-link {
        color: #a0aec0;
        pointer-events: none;
        background-color: var(--pagination-bg);
        border-color: var(--pagination-border-color);
    }

    .category-header {
        background-color: #f8f9fa;
        border-left: 4px solid #4299e1;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .card-body {
            padding: 1rem;
        }

        .card-title {
            font-size: 1rem;
        }
    }

    @media (max-width: 576px) {
        .pagination {
            flex-wrap: wrap;
        }

        .page-item {
            margin: 2px;
        }

        .page-link {
            padding: 0.35rem 0.5rem;
            min-width: 32px;
            font-size: 0.875rem;
        }

        .breadcrumb {
            font-size: 0.875rem;
        }
    }
</style>
@endsection