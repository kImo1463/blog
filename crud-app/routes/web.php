<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Route for the home/welcome page
Route::get('/', function () {
    return view('welcome');
});

// Resource route for the PostController
Route::resource('posts', PostController::class);