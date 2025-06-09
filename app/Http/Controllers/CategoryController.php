<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function show($slug)
    {
        $cat = Category::where('slug', $slug)->firstOrFail();
        $sounds = $cat->soundEffects()->latest()->paginate(12);
        return view('category.show', compact('cat', 'sounds'));
    }
}
