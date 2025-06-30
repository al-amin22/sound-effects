<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <url>
        <loc>{{ url('/about') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>

    <url>
        <loc>{{ url('/privacy-policy') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>

    <url>
        <loc>{{ url('/terms-of-use') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>

    <url>
        <loc>{{ url('/contact') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>

    <url>
        <loc>{{ url('/collection') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>

    {{-- Loop Sound Effects --}}
    @foreach($soundEffects as $sound)
    <url>
        <loc>{{ url('/sound-effects/' . $sound->slug) }}</loc>
        @if($sound->created_at)
        <lastmod>{{ $sound->created_at->toAtomString() }}</lastmod>
        @endif
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    {{-- Loop Categories --}}
    @foreach($categories as $category)
    <url>
        <loc>{{ url('/category/' . $category->slug) }}</loc>
        @if($category->created_at)
        <lastmod>{{ $category->created_at->toAtomString() }}</lastmod>
        @endif
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach

    {{-- Loop Soundpack --}}
    @foreach($soundPacks as $soundpack)
    <url>
        <loc>{{ url('/soundpack/' . $soundpack->slug) }}</loc>
        @if($soundpack->created_at)
        <lastmod>{{ $soundpack->created_at->toAtomString() }}</lastmod>
        @endif
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach

</urlset>
