<?php

namespace App\Http\Controllers;

use App\Models\SoundPack;
use App\Models\SoundEffect;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SoundPackController extends Controller
{
    // Display all sound packs
    public function index(Request $request)
    {
        $query = SoundPack::query()
            ->with(['category', 'sounds'])
            ->withCount('sounds')
            ->orderBy('created_at', 'desc');

        // Filter by search term if present
        if ($request->has('q')) {
            $query->where('name', 'like', '%' . $request->q . '%')
                ->orWhere('description', 'like', '%' . $request->q . '%');
        }

        $soundPacks = $query->paginate(12);

        return view('sound-packs.index', [
            'soundPacks' => $soundPacks,
            'searchTerm' => $request->q ?? null
        ]);
    }

    // Filter by country
    public function indexByCountry($country)
    {
        $soundPacks = SoundPack::where('country', $country)
            ->with(['category', 'sounds'])
            ->withCount('sounds')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('sound-packs.index', [
            'soundPacks' => $soundPacks,
            'currentCountry' => $country
        ]);
    }

    // Filter by category
    public function indexByCategory($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->firstOrFail();

        $soundPacks = SoundPack::where('category_id', $category->id)
            ->with(['category', 'sounds'])
            ->withCount('sounds')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('sound-packs.index', [
            'soundPacks' => $soundPacks,
            'currentCategory' => $category
        ]);
    }

    // Search functionality
    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required|string|min:2'
        ]);

        return $this->index($request);
    }

    // Show single sound pack
    public function show($slug)
    {
        $soundPack = SoundPack::where('slug', 'sound-packs/' . $slug)
            ->with(['category', 'sounds'])
            ->withCount('sounds')
            ->firstOrFail();

        $relatedPacks = SoundPack::where('category_id', $soundPack->category_id)
            ->where('id', '!=', $soundPack->id)
            ->with(['category'])
            ->limit(4)
            ->get();

        // SEO Meta
        $seoTitle = $soundPack->seo_title ?? "{$soundPack->name} Sound Pack | Download Free SFX";
        $seoDescription = $soundPack->seo_description ??
            Str::limit(strip_tags($soundPack->description), 160) ??
            "Download {$soundPack->name} sound pack with {$soundPack->sounds_count} high-quality sound effects.";

        return view('sound-packs.show', [
            'soundPack' => $soundPack,
            'relatedPacks' => $relatedPacks,
            'seoTitle' => $seoTitle,
            'seoDescription' => $seoDescription
        ]);
    }

    // Download sound pack
    public function download($slug)
    {
        $soundPack = SoundPack::where('slug', 'sound-packs/' . $slug)
            ->with('sounds')
            ->firstOrFail();

        // In a real app, you would generate a ZIP file here
        // This is just a placeholder implementation

        return response()->streamDownload(function () use ($soundPack) {
            echo "This would be a ZIP file containing:\n\n";
            foreach ($soundPack->sounds as $sound) {
                echo "- {$sound->title}.mp3\n";
            }
        }, "{$soundPack->name}.zip");
    }

    // API: Get sounds in pack
    public function getSounds(SoundPack $pack)
    {
        $sounds = $pack->sounds()
            ->select(['id', 'title', 'description', 'audio_path', 'duration'])
            ->get();

        return response()->json($sounds);
    }

    // API: Get related packs
    public function getRelatedPacks(SoundPack $pack)
    {
        $related = SoundPack::where('category_id', $pack->category_id)
            ->where('id', '!=', $pack->id)
            ->select(['id', 'name', 'slug', 'image_path'])
            ->limit(4)
            ->get();

        return response()->json($related);
    }
}
