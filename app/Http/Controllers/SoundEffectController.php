<?php

namespace App\Http\Controllers;

use App\Models\SoundEffect;
use App\Models\Category;
use App\Models\SeoEvaluation;
use Illuminate\Http\Request;

class SoundEffectController extends Controller
{
    public function index(Request $request)
    {
        $query = SoundEffect::with(['category', 'seoEvaluation'])
            ->orderBy('created_at', 'desc');

        if ($request->has('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%')
                    ->orWhere('keywords', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $soundEffects = $query->paginate(12);
        $categories = Category::orderBy('name')->get();

        $meta = [
            'title' => 'Free Sound Effects Library ' . date('Y'),
            'description' => 'Download thousands of professional sound effects for videos, games and multimedia projects. Updated daily.',
            'keywords' => 'free sound effects, sound library, SFX download, royalty free audio',
            'og_type' => 'website',
            'og_title' => 'Free Sound Effects Library ' . date('Y'),
            'og_description' => 'Download thousands of professional sound effects for creative projects',
            'og_image' => asset('images/og-soundeffectsfree2025.jpg'),
            'twitter_title' => 'Free Sound Effects Library',
            'twitter_description' => 'Thousands of professional sound effects available for free download',
            'twitter_image' => asset('images/twitter-soundeffectsfree2025.jpg')
        ];

        return view('partials.grid', compact('soundEffects', 'categories', 'meta'));
    }

    public function show($slug)
    {
        $soundEffect = SoundEffect::with(['category'])->where('slug', $slug)->firstOrFail();

        // Prepare dynamic meta data
        $meta = [
            'title' => $soundEffect->title . ' | Free Download',
            'description' => $soundEffect->description ?? 'Download free ' . $soundEffect->title . ' sound effect (' . $soundEffect->duration . 's) for videos, games and multimedia projects',
            'keywords' => $soundEffect->keywords ?? 'free sound effects, ' . strtolower($soundEffect->title) . ' sound, ' . $soundEffect->category->name . ' sounds',
            'og_type' => 'audio.sound',
            'og_title' => $soundEffect->title . ' | Free Sound Effect',
            'og_description' => $soundEffect->description ?? 'Free download of ' . $soundEffect->title . ' sound effect (' . $soundEffect->duration . 's)',
            'og_image' => asset($soundEffect->image_path),
            'og_audio' => asset($soundEffect->audio_path),
            'twitter_title' => 'Download: ' . $soundEffect->title . ' Sound Effect',
            'twitter_description' => 'Free ' . $soundEffect->title . ' sound effect for your creative projects',
            'twitter_image' => asset($soundEffect->image_path)
        ];



        return view('sound-effects.show', [
            'soundEffect' => $soundEffect,
            'meta' => $meta,
            'relatedSounds' => SoundEffect::where('category_id', $soundEffect->category_id)
                ->where('id', '!=', $soundEffect->id)
                ->inRandomOrder()
                ->take(5)
                ->get()
        ]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }
    public function terms()
    {
        return view('pages.terms');
    }
    public function contact()
    {
        return view('contact');
    }
    public function collection()
    {
        return view('pages.collection');
    }

    public function login()
    {
        return view('auth.login');
    }
}
