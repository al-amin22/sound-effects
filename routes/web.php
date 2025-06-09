<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoundEffectController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SoundeffectController as AdminSoundeffectController;
use App\Http\Controllers\CategoryController;


// Halaman umum tanpa auth
Route::get('/', [SoundEffectController::class, 'index'])->name('home');
Route::get('/sound-effects/{id}', [SoundEffectController::class, 'show'])->name('sounds.show');
Route::get('/sound-effects/{slug}', [SoundEffectController::class, 'show'])->name('sound.show');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
Route::view('/about', 'pages.about')->name('about');
Route::view('/privacy-policy', 'pages.privacy')->name('privacy');
Route::view('/terms-of-use', 'pages.terms')->name('terms');
Route::view('/contact', 'contact')->name('contact');
Route::view('collection', 'pages.collection')->name('collection');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');

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
