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

        // Crear la consulta inicial de los videos
        $query = Video::with(['actors', 'categories']);

        // Filtrar por Película o Serie (nombre de la categoría)
        if ($request->has('search_movie') && $request->search_movie != '') {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search_movie . '%');
            });
        }

        // Filtrar por Actor (nombre del actor)
        if ($request->has('search_actor') && $request->search_actor != '') {
            $query->whereHas('actors', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search_actor . '%');
            });
        }

        // Filtrar por Tipo (Edit o Meme)
        if ($request->has('search_type') && $request->search_type != '') {
            $query->where('type', 'like', '%' . $request->search_type . '%');
        }

        // Ejecutar la consulta y obtener los resultados
        $videos = $query->get();

        // Pasar las variables a la vista
        return view('my-videos', compact('videos', 'actors', 'categories'));
    }
}
