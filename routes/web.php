<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;

// Página de inicio
Route::get('/', function () {
    return view('home');
});

// Página sobre mí
Route::get('/about-me', function () {
    return view('about-me');
});

// Página de videos (usando el controlador VideoController)
Route::get('/my-videos', [VideoController::class, 'index']);

// Página de contacto
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/import-videos', [VideoController::class, 'importVideosFromFolder']);

