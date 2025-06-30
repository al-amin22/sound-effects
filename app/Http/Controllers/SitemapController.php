<?php

namespace App\Http\Controllers;

use App\Models\SoundEffect;
use App\Models\Category;
use App\Models\SoundPack;

class SitemapController extends Controller
{
    public function index()
    {
        $soundEffects = SoundEffect::all();
        $categories = Category::all();
        $soundPacks = SoundPack::all();

        $content = view('sitemap', compact('soundEffects', 'categories', 'soundPacks'));

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }
}
