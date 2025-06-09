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

    public function show($id)
    {
        $sound = SoundEffect::with('category')->findOrFail($id);

        return view('sound-effects.show', compact('sound'));
    }
}
