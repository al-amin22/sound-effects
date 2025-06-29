<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SoundEffect;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = SoundEffect::with(['category', 'user'])->active();

        // Filter by category if provided
        if ($request->has('category')) {
            $categorySlug = $request->input('category');
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });

            // Get current category for display
            $currentCategory = Category::where('slug', $categorySlug)->first();
        }

        // Apply sorting
        switch ($request->input('sort')) {
            case 'popular':
                $query->orderBy('downloads_count', 'desc');
                break;
            case 'duration':
                $query->orderBy('duration', 'desc');
                break;
            default:
                $query->latest();
        }

        // Apply search if provided
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%")
                    ->orWhere('tags', 'like', "%$search%");
            });
        }

        $soundEffects = $query->paginate(12);

        // Get categories for filter dropdown
        $categories = Category::withCount('soundEffects')->orderBy('name')->get();
        $soundEffects = SoundEffect::with('category')->paginate(12);
        $categoryName = request('category') ? Category::where('slug', request('category'))->first()->name : 'All Sounds';

        return view('home', [
            'soundEffects' => $soundEffects,
            'categories' => $categories,
            'currentCategory' => $currentCategory ?? null,
            'categoryName' => $categoryName,
        ]);
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $sounds = $category->soundEffects()->latest()->paginate(12);
        $sound = SoundEffect::with('category')->where('slug', $slug)->firstOrFail();
        return view('category.show', compact('category', 'sounds', 'sound'));
    }
}
