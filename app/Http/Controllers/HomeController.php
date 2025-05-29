<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class HomeController extends Controller
{
    public function index()
    {
        $latestVideos = Video::orderBy('created_at', 'desc')->take(3)->get();
        $favoriteVideos = Video::where('is_favorite', true)->get();
        $featuredVideoPath = asset('video/featured.mp4');

        return view('home', compact('latestVideos', 'favoriteVideos' , 'featuredVideoPath'));
    }
}
