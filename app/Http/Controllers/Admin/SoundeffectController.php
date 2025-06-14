<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SoundEffect;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SoundeffectController extends Controller
{
    // Tampilkan halaman index dengan semua sound effects dan kategori
    public function index()
    {
        $soundEffects = SoundEffect::with('category')->latest()->paginate(10);
        $categories = Category::all();
        return view('admin.sound-effects.index', compact('soundEffects', 'categories'));
    }

    // Simpan sound effect baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'required|file|mimes:mp3,wav,ogg',
            'category_id' => 'required|exists:categories,id',
        ]);

        $file = $request->file('file_path');
        $path = $file->store('sound_effects', 'public');

        SoundEffect::create([
            'title' => $request->title,
            'keywords' => $request->keywords, // Pastikan field 'keywords' ada di model SoundEffect
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'file_path' => $path,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.soundeffects.index')->with('success', 'Sound effect created successfully.');
    }

    // Update sound effect
    public function update(Request $request, SoundEffect $soundEffect)
    {
        $request->validate([
            'title' => 'required|max:255|unique:sound_effects,title,' . $soundEffect->id,
            'description' => 'nullable|max:500',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title),
        ];

        // Tambahkan jika field keywords disediakan
        if ($request->has('keywords')) {
            $data['keywords'] = $request->keywords;
        }

        // Jika file diupload, update file_path
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $data['file_path'] = $file->store('sound_effects', 'public');
        }

        $soundEffect->update($data);

        // dd($data); // Hapus ini setelah debugging

        return redirect()->route('admin.soundeffects.index')
            ->with('success', 'Sound effect updated successfully.');
    }


    public function destroy($id)
    {
        $soundEffect = SoundEffect::findOrFail($id);
        $soundEffect->forceDelete();

        return redirect()->route('admin.soundeffects.index')
            ->with('success', 'Sound effect deleted.');
    }
}
