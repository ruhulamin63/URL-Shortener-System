<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UrlController;

Route::get('/', function () {
    return view('welcome');
});

//========================================================
require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route for short URL redirection

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Urls routes
    Route::get('/urls', [UrlController::class, 'index'])->name('urls.index');
    Route::get('urls/create', [UrlController::class, 'create'])->name('urls.create');
    Route::post('urls', [UrlController::class, 'store'])->name('urls.store');
    Route::get('urls/{url}', [UrlController::class, 'show'])->name('urls.show');
    Route::get('urls/{url}/edit', [UrlController::class, 'edit'])->name('urls.edit');
    Route::patch('urls/{url}', [UrlController::class, 'update'])->name('urls.update');
    Route::delete('urls/{url}', [UrlController::class, 'destroy'])->name('urls.destroy');
});

///========================================================

Route::get('/{shortUrl}', [UrlController::class, 'redirect'])->name('urls.redirect');

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

