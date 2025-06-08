<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Actor;
use App\Models\Category;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    // Muestra todos los videos con la posibilidad de filtrarlos
    public function index(Request $request)
    {
        $actors = Actor::all();
        $categories = Category::all();

        // Crear la consulta inicial
        $query = Video::with(['actors', 'categories']);

        // Filtrar por nombre de categoría (película o serie)
        if ($request->filled('search_movie')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search_movie . '%');
            });
        }

        // Filtrar por nombre de actor
        if ($request->filled('search_actor')) {
            $query->whereHas('actors', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search_actor . '%');
            });
        }

        // Filtrar por tipo exacto (Edit o Meme)
        if ($request->filled('search_type')) {
            $query->where('type', strtolower($request->search_type));
        }

        // Obtener los resultados
        $videos = $query->get();

        return view('my-videos', compact('videos', 'actors', 'categories'));
    }

    // Muestra un video individual
    public function show($id)
    {
        // 1) Recuperamos el video (con relaciones si quieres)
        $video = Video::with(['categories', 'actors'])->findOrFail($id);

        // 2) Incrementamos en 1 el contador de reproducciones
        //    Esto asume que cada vez que entra a esta ruta "ver video",
        //    contabilizamos una reproducción.
        $video->increment('view_count');

        // 3) Devolvemos la vista
        return view('videos.show', compact('video'));
    }
}
