<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscribe;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribe,email',
        ]);

        Subscribe::create([
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'You have successfully subscribed to our newsletter!');
    }
}
