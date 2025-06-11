<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoundEffectController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SoundeffectController as AdminSoundeffectController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SitemapController;

// Halaman umum tanpa auth
Route::get('/about', [SoundEffectController::class, 'about'])->name('about');
Route::get('/privacy-policy', [SoundEffectController::class, 'privacy'])->name('privacy');
Route::get('/terms-of-use', [SoundEffectController::class, 'terms'])->name('terms');
Route::get('/contact', [SoundEffectController::class, 'contact'])->name('contact');
Route::get('/collection', [SoundEffectController::class, 'collection'])->name('collection');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/', [SoundEffectController::class, 'index'])->name('home');
Route::get('/{slug}', [SoundEffectController::class, 'show'])->name('sounds.show');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');


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

require __DIR__ . '/auth.php';
