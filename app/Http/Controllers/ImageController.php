<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // Buat folder uploads jika belum ada
            $uploadPath = public_path('uploads');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }

            // Generate nama file unik
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();

            // Simpan file
            $request->file('image')->move($uploadPath, $fileName);

            return response()->json([
                'success' => true,
                'path' => asset("uploads/$fileName"),
                'url' => url("uploads/$fileName")
            ], 200, [], JSON_UNESCAPED_SLASHES);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function audio(Request $request)
    {
        try {
            $request->validate([
                'audio' => 'required|mimes:mp3,wav,ogg|max:2048',
            ]);

            // Buat folder audio jika belum ada
            $uploadPath = public_path('audio');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }

            // Generate nama file unik
            $fileName = time() . '_' . $request->file('audio')->getClientOriginalName();

            // Simpan file
            $request->file('audio')->move($uploadPath, $fileName);

            return response()->json([
                'success' => true,
                'path' => asset("audio/$fileName"),
                'url' => url("audio/$fileName")
            ], 200, [], JSON_UNESCAPED_SLASHES);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
