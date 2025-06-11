@extends('layouts.app')

@section('title', 'Free Sound Effects')

@section('content')
<div class="container my-4">
    <div class="row">
        @foreach($sounds as $s)
        <div class="col-12 col-sm-6 col-md-4 mb-4">
            <article class="bg-white rounded shadow p-3 d-flex flex-column h-100">
                <h2 class="h5 mb-2">
                    <a href="{{ route('sounds.show', $s->slug) }}" class="text-decoration-none text-dark" itemprop="url">
                        {{ $s->title }}
                    </a>
                </h2>

                <p class="text-muted small mb-2">
                    {{ Str::limit($s->description, 50) }}
                    @if(strlen($s->description) > 50)
                    ... <a href="{{ route('sounds.show', $s->slug) }}" class="text-primary">Lihat deskripsi</a>
                    @endif
                </p>

                <audio controls class="w-100 mb-2" controlsList="nodownload">
                    <source src="{{ asset('storage/' . $s->file_path) }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>

                <button class="btn btn-outline-primary btn-sm mt-auto download-btn" data-url="{{ asset('storage/' . $s->file_path) }}">
                    Download
                </button>

                <small class="text-muted mt-2">
                    Category:
                    <a href="{{ route('category.show', $s->category->slug) }}" class="text-primary">
                        {{ $s->category->name }}
                    </a>
                </small>
            </article>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal Pop-up -->
<div class="modal fade" id="downloadModal" tabindex="-1" aria-labelledby="downloadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center p-4">
            <div class="modal-body">
                <p id="downloadMessage" class="mb-2">
                    Your file is being prepared for download, please wait...
                </p>
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

                // Reset modal
                downloadLink.classList.add('d-none');
                downloadLink.href = '#';
                countdown.textContent = `Wait ${seconds} seconds...`;

                // Show modal
                modal.show();

                // Countdown
                const timer = setInterval(() => {
                    seconds--;
                    countdown.textContent = `Wait ${seconds} seconds...`;

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