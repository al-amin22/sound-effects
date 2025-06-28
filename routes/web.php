<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoundEffectController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SoundeffectController as AdminSoundeffectController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SoundPackController;


// Halaman umum tanpa auth
Route::get('/login', [SoundEffectController::class, 'login'])->name('login');
Route::get('/about', [SoundEffectController::class, 'about'])->name('about');
Route::get('/privacy-policy', [SoundEffectController::class, 'privacy'])->name('privacy');
Route::get('/terms-of-use', [SoundEffectController::class, 'terms'])->name('terms');
Route::get('/contact', [SoundEffectController::class, 'contact'])->name('contact');
Route::get('/collection', [SoundEffectController::class, 'collection'])->name('collection');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/search', [SoundEffectController::class, 'search'])->name('search');

// Route auth protected (harus login)
Route::middleware(['auth'])->group(function () {
    Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('categories', AdminCategoryController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.categories.index',
            'create' => 'admin.categories.create',
            'store' => 'admin.categories.store',
            'edit' => 'admin.categories.edit',
            'update' => 'admin.categories.update',
            'destroy' => 'admin.categories.destroy'
        ]);
    Route::resource('soundeffects', AdminSoundeffectController::class)
        ->except(['create', 'edit', 'show'])
        ->names([
            'index' => 'admin.soundeffects.index',
            'store' => 'admin.soundeffects.store',
            'update' => 'admin.soundeffects.update',
            'destroy' => 'admin.soundeffects.destroy'
        ]);
});


// Halaman utama
Route::get('/', [SoundEffectController::class, 'index'])->name('home');
// Sound Packs Routes - MOVED BEFORE GENERIC ROUTES
Route::prefix('sound-packs')->group(function () {
    Route::get('/', [SoundPackController::class, 'index'])->name('sound-packs.index');

    // Pindahkan route show ke atas dalam group
    Route::get('/{slug}', [SoundPackController::class, 'show'])
        ->name('sound-packs.show');

    Route::get('/country/{country}', [SoundPackController::class, 'indexByCountry'])
        ->where('country', '[A-Z]{2}')
        ->name('sound-packs.country');

    Route::get('/category/{category}', [SoundPackController::class, 'indexByCategory'])
        ->name('sound-packs.category');

    Route::get('/search', [SoundPackController::class, 'search'])
        ->name('sound-packs.search');

    Route::get('/{slug}/download', [SoundPackController::class, 'download'])
        ->name('sound-packs.download');

    // API endpoints
    Route::prefix('api')->group(function () {
        Route::get('/sounds/{pack}', [SoundPackController::class, 'getSounds'])
            ->name('sound-packs.api.sounds');
        Route::get('/related/{pack}', [SoundPackController::class, 'getRelatedPacks'])
            ->name('sound-packs.api.related');
    });
});

// Other routes
Route::get('/{slug}', [SoundEffectController::class, 'show'])->name('sounds.show');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/{slug}', [SoundEffectController::class, 'show'])->name('sounds.show');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');


Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

require __DIR__ . '/auth.php';
