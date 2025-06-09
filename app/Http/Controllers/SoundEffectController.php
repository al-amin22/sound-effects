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
        return view('sound.show', compact('sound'));
    }
    public function search(Request $r)
    {
        $q = $r->query('q');
        $sounds = SoundEffect::where('title', 'like', "%$q%")
            ->orWhere('description', 'like', "%$q%")
            ->paginate(12);
        return view('search', compact('sounds', 'q'));
    }
    public function upload(Request $r)
    {
        $r->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'sound' => 'required|mimes:mp3,wav|max:5120'
        ]);
        $file = $r->file('sound');
        $path = $file->store('sounds', 'public');
        SoundEffect::create([
            'title' => $r->title,
            'slug' => Str::slug($r->title) . '-' . Str::random(5),
            'description' => $r->description,
            'file_path' => $path,
            'category_id' => $r->category_id
        ]);
        return redirect()->back()->with('success', 'Upload berhasil');
    }
}
