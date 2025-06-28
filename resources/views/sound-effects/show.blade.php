@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $soundEffect->title }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Sound Effects</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('home', ['category' => $soundEffect->category->slug]) }}">{{ $soundEffect->category->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $soundEffect->title }}</li>
                </ol>
            </nav>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ asset($soundEffect->image_path) }}" alt="{{ $soundEffect->title }}" class="img-fluid rounded" style="max-height: 300px;">
                    </div>

                    <div class="d-flex justify-content-center mb-4">
                        <audio controls class="w-100" style="max-width: 500px;">
                            <source src="{{ asset($soundEffect->audio_path) }}" type="audio/mpeg">
                        </audio>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <span class="badge bg-primary">{{ $soundEffect->category->name }}</span>
                            <span class="badge bg-secondary ms-2">{{ $soundEffect->duration }}s</span>
                            <span class="badge bg-info ms-2">{{ $soundEffect->country }}</span>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-outline-secondary" onclick="downloadSound('{{ asset($soundEffect->audio_path) }}')">
                                <i class="fas fa-download"></i> Download
                            </button>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h4>Description</h4>
                        <p>{{ $soundEffect->description ?? 'No description available' }}</p>
                    </div>

                    <div class="mb-4">
                        <h4>Keywords</h4>
                        <div class="d-flex flex-wrap gap-2">
                            @if(!empty($soundEffect->keywords))
                            @foreach(explode(',', $soundEffect->keywords) as $keyword)
                            <span class="badge bg-light text-dark">{{ trim($keyword) }}</span>
                            @endforeach
                            @else
                            <span class="text-muted">No keywords</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title">Article</h4>
                    <div class="article-content">
                        {!! Str::markdown($soundEffect->article ?? 'No article content available') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Related Sounds</h5>
                </div>
                <div class="card-body">
                    @if($relatedSounds && count($relatedSounds) > 0)
                    @foreach($relatedSounds as $related)
                    <div class="d-flex mb-3">
                        <img src="{{ asset($related->image_path) }}" alt="{{ $related->title }}" class="rounded me-3" width="60" height="60">
                        <div>
                            <h6 class="mb-1"><a href="{{ route('sounds.show', $related->slug) }}">{{ $related->title }}</a></h6>
                            <small class="text-muted">{{ $related->category->name }}</small>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="alert alert-info">No related sounds found</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function downloadSound(url) {
        const a = document.createElement('a');
        a.href = url;
        a.download = '{{ $soundEffect->slug }}.mp3';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }
</script>

<style>
    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 1rem 0;
    }

    .article-content h2,
    .article-content h3 {
        margin-top: 1.5rem;
        margin-bottom: 1rem;
    }

    .article-content ul,
    .article-content ol {
        padding-left: 2rem;
        margin-bottom: 1rem;
    }

    .article-content pre {
        background: #f8f9fa;
        padding: 1rem;
        border-radius: 8px;
        overflow-x: auto;
    }
</style>
@endsection