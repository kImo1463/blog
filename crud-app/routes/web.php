<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController; // Import the PostController
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   //return view('welcome');
   return view('auth.login'); // Directly show the login page
   });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Protecting profile routes with authentication
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Protecting blog routes with authentication
    Route::resource('posts', PostController::class); // Users must be logged in to manage blog posts
});

require __DIR__.'/auth.php';
