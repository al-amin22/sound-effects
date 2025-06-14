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

        // Ambil file dari form
        $file = $request->file('file_path');

        // Buat nama file unik
        $filename = time() . '_' . Str::slug($file->getClientOriginalName(), '_');

        // Tentukan path tujuan (di dalam public/sound_effects)
        $destinationPath = public_path('sound_effects');

        // Pastikan folder ada, kalau belum maka buat
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0775, true);
        }

        // Pindahkan file ke public/sound_effects/
        $file->move($destinationPath, $filename);

        // Simpan path relatif ke database
        $relativePath = 'sound_effects/' . $filename;

        // Simpan ke database
        SoundEffect::create([
            'title' => $request->title,
            'keywords' => $request->keywords,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'file_path' => $relativePath,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.soundeffects.index')->with('success', 'Sound effect created successfully.');
    }


    // Update sound effect
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'nullable|file|mimes:mp3,wav,ogg',
            'category_id' => 'required|exists:categories,id',
        ]);

        $soundEffect = SoundEffect::findOrFail($id);

        // Jika ada file baru diupload
        if ($request->hasFile('file_path')) {
            // Hapus file lama jika ada
            if ($soundEffect->file_path && File::exists(public_path($soundEffect->file_path))) {
                File::delete(public_path($soundEffect->file_path));
            }

            $file = $request->file('file_path');
            $filename = time() . '_' . Str::slug($file->getClientOriginalName(), '_');
            $destinationPath = public_path('sound_effects');

            // Pastikan folder tujuan tersedia
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775, true);
            }

            // Pindahkan file baru
            $file->move($destinationPath, $filename);

            // Update path baru
            $soundEffect->file_path = 'sound_effects/' . $filename;
        }

        // Update data lainnya
        $soundEffect->title = $request->title;
        $soundEffect->keywords = $request->keywords;
        $soundEffect->slug = Str::slug($request->title);
        $soundEffect->description = $request->description;
        $soundEffect->category_id = $request->category_id;

        $soundEffect->save();

        return redirect()->route('admin.soundeffects.index')->with('success', 'Sound effect updated successfully.');
    }


    public function destroy($id)
    {
        $soundEffect = SoundEffect::findOrFail($id);
        $soundEffect->forceDelete();

        return redirect()->route('admin.soundeffects.index')
            ->with('success', 'Sound effect deleted.');
    }
}
