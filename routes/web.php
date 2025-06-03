<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\Category;

// Página de inicio
Route::get('/', function () {
    return view('home');
});

// Página de videos (usando el controlador VideoController)
Route::get('/my-videos', [VideoController::class, 'index']);

// Página de contacto
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/videos/{video}', [VideoController::class, 'show'])->name('videos.show');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/search/actors', function (Request $request) {
    $q = $request->get('q');
    return Actor::where('name', 'LIKE', "%$q%")->pluck('name');
});

Route::get('/search/categories', function (Request $request) {
    $q = $request->get('q');
    return Category::where('name', 'LIKE', "%$q%")->pluck('name');
});