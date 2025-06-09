<div class="grid md:grid-cols-3 gap-6">
    @foreach($sounds as $s)
    <article>
        <a href="{{ route('sound.show',$s->slug) }}">
            <h2 class="font-semibold">{{ $s->title }}</h2>
        </a>
        <p>{{ Str::limit($s->description,100) }}</p>
        <small>Category: <a href="{{ route('category.show',$s->category->slug) }}">{{ $s->category->name }}</a></small>
    </article>
    @endforeach
</div>
