<?php

namespace App\Http\Controllers;

use App\Models\SoundEffect;
use App\Models\Category;

class SitemapController extends Controller
{
    public function index()
    {
        $soundEffects = SoundEffect::all();
        $categories = Category::all();

        $content = view('sitemap', compact('soundEffects', 'categories'));

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }
}
