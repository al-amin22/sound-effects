<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Share popular categories with all views
        View::composer('*', function ($view) {
            $popularCategories = Category::withCount('soundEffects')
                ->orderBy('sound_effects_count', 'desc')
                ->take(5)
                ->get();

            $view->with('popularCategories', $popularCategories);
        });
    }
}
