@extends('layouts.app')

@section('title', 'Free Sound Effects')
<style>
    .pagination {
        --pagination-color: #4a5568;
        --pagination-bg: #fff;
        --pagination-active-color: #fff;
        --pagination-active-bg: #4299e1;
        --pagination-hover-color: #2c5282;
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
        background-color: #f7fafc;
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

    /* Responsive Adjustments */
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
        }
    }
</style>
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

    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Sound effects pagination">
            <ul class="pagination pagination-lg flex-wrap justify-content-center"> <!-- Added flex-wrap and justify-content-center -->
                {{-- Previous Button --}}
                <li class="page-item {{ $soundEffects->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $soundEffects->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                {{-- Page Numbers --}}
                @foreach ($soundEffects->getUrlRange(1, $soundEffects->lastPage()) as $page => $url)
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