@extends('layouts.app')

@section('title', $seoTitle)
@section('description', $seoDescription)

@section('content')
<div class="container py-4 py-md-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sound-packs.index') }}">Sound Packs</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $soundPack->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8">
            <article>
                <header class="mb-4">
                    <h1 class="mb-2">{{ $soundPack->name }}</h1>

                    <div class="d-flex flex-wrap gap-2 mb-3">
                        <span class="badge bg-primary">{{ $soundPack->category->name }}</span>
                        <span class="badge bg-secondary">{{ $soundPack->country }}</span>
                        <span class="badge bg-success">{{ $soundPack->sounds_count }} sounds</span>
                    </div>

                    <p class="lead">{{ $soundPack->description }}</p>
                </header>

                <section class="mb-5">
                    <h2 class="h4 mb-3">Sounds Included</h2>
                    <div class="list-group">
                        @foreach($soundPack->sounds as $sound)
                        <div class="list-group-item list-group-item-action">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                                <div class="flex-grow-1">
                                    <h3 class="h5 mb-1">{{ $sound->title }}</h3>
                                    <p class="mb-2 text-muted small">{{ $sound->description }}</p>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach(explode(',', $sound->keywords) as $keyword)
                                        <span class="badge bg-light text-dark border">{{ trim($keyword) }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row align-items-center gap-2">
                                    <audio controls class="audio-player">
                                        <source src="{{ asset($sound->audio_path) }}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                    <a href="{{ route('sound-effects.show', $sound->slug) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        Details
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>

                @if($soundPack->sounds->first() && $soundPack->sounds->first()->article)
                <section class="mb-5">
                    <h2 class="h4 mb-3">About This Sound Pack</h2>
                    <div class="content">
                        {!! $soundPack->sounds->first()->article !!}
                    </div>
                </section>
                @endif
            </article>
        </div>

        <div class="col-lg-4">
            <aside>
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="h5 card-title mb-3">Download Full Pack</h3>
                        <a href="{{ route('sound-packs.download', Str::after($soundPack->slug, 'sound-packs/')) }}"
                            class="btn btn-primary w-100 mb-2">
                            <i class="fas fa-download me-2"></i> Download All (ZIP)
                        </a>
                        <p class="small text-muted mb-0">
                            Includes all {{ $soundPack->sounds_count }} sounds in high quality MP3 format
                        </p>
                    </div>
                </div>

                @if($relatedPacks->count() > 0)
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="h5 card-title mb-3">Related Packs</h3>
                        <div class="list-group list-group-flush">
                            @foreach($relatedPacks as $related)
                            <a href="{{ route('sound-packs.show', Str::after($related->slug, 'sound-packs/')) }}"
                                class="list-group-item list-group-item-action">
                                <div class="d-flex align-items-center gap-3">
                                    @if($related->sounds->first() && $related->sounds->first()->image_path)
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset($related->sounds->first()->image_path) }}"
                                            width="60" height="60"
                                            class="rounded object-fit-cover"
                                            alt="{{ $related->name }}">
                                    </div>
                                    @endif
                                    <div class="flex-grow-1">
                                        <h4 class="h6 mb-1">{{ $related->name }}</h4>
                                        <small class="text-muted">{{ $related->sounds->count() }} sounds</small>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <h3 class="h5 card-title mb-3">Share This Pack</h3>
                        <div class="d-flex gap-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($soundPack->name) }}&url={{ urlencode(url()->current()) }}"
                                target="_blank" class="btn btn-outline-info btn-sm">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(url()->current()) }}&media={{ urlencode(asset($soundPack->sounds->first()->image_path ?? '')) }}&description={{ urlencode($soundPack->name) }}"
                                target="_blank" class="btn btn-outline-danger btn-sm">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .audio-player {
        width: 100%;
        min-width: 200px;
    }

    @media (max-width: 767.98px) {
        .audio-player {
            width: 100%;
        }
    }

    .content h2,
    .content h3,
    .content h4 {
        margin-top: 1.5rem;
        margin-bottom: 1rem;
    }

    .content p {
        margin-bottom: 1rem;
        line-height: 1.6;
    }

    .content ul,
    .content ol {
        margin-bottom: 1rem;
        padding-left: 1.5rem;
    }

    .content img {
        max-width: 100%;
        height: auto;
        margin: 1rem 0;
        border-radius: 0.25rem;
    }
</style>
@endsection