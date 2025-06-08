<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\Category;

// Ruta para la página de inicio usando HomeController (reemplaza la función anónima)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Ruta para la página de videos
Route::get('/my-videos', [VideoController::class, 'index']);

// Rutas para la página de contacto
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Ruta para mostrar un video específico
Route::get('/videos/{video}', [VideoController::class, 'show'])->name('videos.show');

// Ruta para autocompletar búsqueda de actores
Route::get('/search/actors', function (Request $request) {
    $q = $request->get('q');
    return Actor::where('name', 'LIKE', "%$q%")->pluck('name');
});

// Ruta para autocompletar búsqueda de categorías (películas o series)
Route::get('/search/categories', function (Request $request) {
    $q = $request->get('q');
    return Category::where('name', 'LIKE', "%$q%")->pluck('name');
});

// Rutas para la sección de ideas
Route::get('/ideas', [IdeaController::class, 'index'])->name('ideas.index');
Route::post('/ideas', [IdeaController::class, 'store'])->name('ideas.store');
Route::post('/ideas/vote/{id}', [IdeaController::class, 'vote'])->name('ideas.vote');

// Rutas para vistas legales estáticas
Route::view('/legal', 'legal.terms')->name('terms');
Route::view('/privacy', 'legal.privacy')->name('privacy');
Route::view('/cookie', 'legal.cookie')->name('cookie');