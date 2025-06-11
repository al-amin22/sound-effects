<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoundEffect;
use App\Models\Category;
use Illuminate\Support\Str;

class SoundEffectController extends Controller
{
    public function index()
    {
        $sounds = SoundEffect::with('category')->latest()->paginate(12);
        $categories = Category::all();
        return view('home', compact('sounds', 'categories'));
    }

    public function show($slug)
    {
        $sound = SoundEffect::with('category')->where('slug', $slug)->firstOrFail();
        return view('sound-effects.show', compact('sound'));
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
}
