<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class HomeController extends Controller
{
    // Esta función carga la página principal
    public function index()
    {
        // Traigo los 3 vídeos más nuevos para mostrarlos en “Latest Works”
        $latestVideos = Video::orderBy('created_at', 'desc')->take(3)->get();

        // También pillo los 3 vídeos con más vistas para destacarlos aparte
        $mostViewed = Video::orderBy('view_count', 'desc')
            ->take(3)
            ->get();

        // Ruta del vídeo destacado, que está guardado localmente (aunque no lo paso a la vista aquí)
        $featuredVideoPath = asset('video/featured.mp4');

        // Finalmente, paso estos datos a la vista ‘home’
        return view('home', compact('latestVideos', 'mostViewed'));
    }
}
