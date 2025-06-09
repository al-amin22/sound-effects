<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SoundEffect;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('file_path')) {
            // Cek dulu file_path tidak null dan file ada sebelum hapus
            if ($soundEffect->file_path && Storage::disk('public')->exists($soundEffect->file_path)) {
                Storage::disk('public')->delete($soundEffect->file_path);
            }

            // Simpan file baru
            $file = $request->file('file_path');
            $soundEffect->file_path = $file->store('sound_effects', 'public');
        }

        $soundEffect->title = $request->title;
        $soundEffect->slug = Str::slug($request->title);
        $soundEffect->description = $request->description;
        $soundEffect->category_id = $request->category_id;
        $soundEffect->save();

        return redirect()->route('admin.soundeffects.index')->with('success', 'Sound effect updated successfully.');
    }

    public function destroy(SoundEffect $soundEffect)
    {
        // Hapus file audio dari storage (jika ada)
        if ($soundEffect->file_path && Storage::disk('public')->exists($soundEffect->file_path)) {
            Storage::disk('public')->delete($soundEffect->file_path);
        }

        // Hapus sound effect dari database
        $soundEffect->delete();

        return redirect()->route('admin.soundeffects.index')
            ->with('success', 'Sound effect and its file have been deleted.');
    }
}
