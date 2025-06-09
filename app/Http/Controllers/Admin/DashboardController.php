<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SoundEffect;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_users' => User::count(),
            'total_sounds' => SoundEffect::count(),
            'total_categories' => Category::count(),
            'recent_sounds' => SoundEffect::latest()->take(5)->get(),
        ];

        return view('admin.dashboard.index', compact('data'));
    }
}
