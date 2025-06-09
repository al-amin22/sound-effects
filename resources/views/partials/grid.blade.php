<div class="container my-4">
    <div class="row">
        @foreach($sounds as $s)
        <div class="col-12 col-sm-6 col-md-4 mb-4">
            <article class="bg-white rounded shadow p-3 d-flex flex-column h-100">
                <h2 class="h5 mb-2">
                    <a href="#" class="text-decoration-none text-dark">
                        {{ $s->title }}
                    </a>
                </h2>

                <p class="text-muted small mb-2">
                    {{ Str::limit($s->description, 50) }}
                    @if(strlen($s->description) > 50)
                    ... <a href="{{ route('sounds.show', $s->id) }}" class="text-primary">Lihat deskripsi</a>
                    @endif
                </p>

                <audio controls class="w-100 mb-2">
                    <source src="{{ asset('storage/' . $s->file_path) }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>

                <small class="text-muted mt-auto">
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
