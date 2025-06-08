<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Actor;
use App\Models\Category;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    // Muestra la lista de videos, con filtros opcionales para categoría, actor y tipo
    public function index(Request $request)
    {
        // Traemos todos los actores y categorías para usarlos en filtros o dropdowns en la vista
        $actors = Actor::all();
        $categories = Category::all();

        // Empezamos la consulta con las relaciones para evitar N+1 queries
        $query = Video::with(['actors', 'categories']);

        // Si nos pasan un filtro para categoría (película o serie), lo aplicamos
        if ($request->filled('search_movie')) {
            $query->whereHas('categories', function ($q) use ($request) {
                // Busca coincidencias parciales en el nombre de la categoría
                $q->where('name', 'like', '%' . $request->search_movie . '%');
            });
        }

        // Si hay filtro por actor, filtramos por el nombre del actor
        if ($request->filled('search_actor')) {
            $query->whereHas('actors', function ($q) use ($request) {
                // Igual, coincidencias parciales para el nombre del actor
                $q->where('name', 'like', '%' . $request->search_actor . '%');
            });
        }

        // Filtramos por tipo exacto si viene (edit o meme), asegurándonos que esté en minúsculas
        if ($request->filled('search_type')) {
            $query->where('type', strtolower($request->search_type));
        }

        // Ejecutamos la consulta y recogemos los resultados
        $videos = $query->get();

        // Mandamos todo a la vista, incluyendo las listas para filtros
        return view('my-videos', compact('videos', 'actors', 'categories'));
    }

    // Muestra la página de un video individual, incrementando su contador de vistas
    public function show($id)
    {
        // Recuperamos el video con sus actores y categorías relacionados
        $video = Video::with(['categories', 'actors'])->findOrFail($id);

        // Incrementamos el contador de vistas para llevar un control
        $video->increment('view_count');

        // Devolvemos la vista con el video cargado
        return view('videos.show', compact('video'));
    }
}
