@extends('layouts.app')

{{-- SEO Meta Tags --}}
@section('title', 'Free ' . $category->name . ' Sound Effects - Download & Listen')
@section('description', Str::limit($category->description, 150))
@section('keywords', $category->name . ', free sound effects, audio, sfx, ' . strtolower($category->name))
@section('canonical', route('category.show', $category->slug))

{{-- Open Graph Meta Tags --}}
@section('og_title', 'Free Sound Effects in "' . $category->name . '" Category')
@section('og_description', Str::limit($category->description, 150))
@section('og_type', 'website')
@section('og_url', route('category.show', $category->slug))

@section('content')
<div class="container my-5">
    <header>
        <h1 class="mb-4">Category: {{ $category->name }}</h1>
        <p class="lead">Explore high-quality sound effects in the "{{ $category->name }}" category. All effects are ready for use in your creative projects.</p>
    </header>

    @if($sounds->count())
    <section aria-label="Sound effects list" class="row">
        @foreach($sounds as $sound)
        <article class="col-12 col-sm-6 col-md-4 mb-4 bg-white rounded shadow p-3 d-flex flex-column h-100" itemscope itemtype="https://schema.org/AudioObject">
            <h2 class="h5 mb-2" itemprop="name">
                <a href="{{ route('sounds.show', $sound->slug) }}" class="text-decoration-none text-dark" itemprop="url">
                    {{ $sound->title }}
                </a>
            </h2>

            <p class="text-muted small mb-2">
                {{ Str::limit($sound->description, 50) }}
                @if(strlen($sound->description) > 50)
                ... <a href="{{ route('sounds.show', $sound->slug) }}" class="text-primary">View full description</a>
                @endif
            </p>

            <audio controls class="w-100 mb-2" preload="none" itemprop="contentUrl">
                <source src="{{ asset('storage/' . $sound->file_path) }}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>


            <footer class="mt-auto">
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        Category:
                        <a href="{{ route('category.show', $sound->category->slug) }}" class="text-primary" itemprop="genre">
                            {{ $sound->category->name }}
                        </a>
                    </small>
                    <button class="btn btn-sm btn-outline-primary download-btn" data-url="{{ asset('storage/' . $sound->file_path) }}">
                        Download
                    </button>
                </div>
            </footer>
        </article>
        @endforeach
    </section>

    <nav aria-label="Pagination" class="d-flex justify-content-center mt-4">
        {{ $sounds->links() }}
    </nav>
    @else
    <p>There are no sound effects in this category.</p>
    @endif

    <a href="{{ route('home') }}" class="btn btn-secondary mt-4" aria-label="Go back to home page">Back to Home</a>
</div>

{{-- Modal --}}
<div class="modal fade" id="downloadModal" tabindex="-1" aria-labelledby="downloadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center p-4">
            <div class="modal-body">
                <p id="downloadMessage" class="mb-2">Preparing your download. Please wait...</p>
                <div id="countdown" class="fw-bold mb-3 text-danger"></div>
                <a id="downloadLink" href="#" class="btn btn-success d-none" download>Download Now</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.download-btn');
        const modalEl = document.getElementById('downloadModal');
        const modal = new bootstrap.Modal(modalEl);
        const downloadLink = document.getElementById('downloadLink');
        const countdown = document.getElementById('countdown');

        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const fileUrl = this.dataset.url;
                let seconds = 10;

                // Reset modal state
                downloadLink.classList.add('d-none');
                downloadLink.href = '#';
                countdown.textContent = `Tunggu ${seconds} detik...`;

                modal.show();

                const timer = setInterval(() => {
                    seconds--;
                    countdown.textContent = `Tunggu ${seconds} detik...`;

                    if (seconds <= 0) {
                        clearInterval(timer);
                        countdown.textContent = '';
                        downloadLink.href = fileUrl;
                        downloadLink.classList.remove('d-none');
                    }
                }, 1000);
            });
        });
    });
</script>
@endpush