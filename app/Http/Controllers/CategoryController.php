<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        if ($categories->isEmpty()) {
            return view('category.index')->with('message', 'No categories found.');
        }
        return view('home', compact('categories'));
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $sounds = $category->soundEffects()->latest()->paginate(12);
        return view('category.show', compact('category', 'sounds'));
    }
}
