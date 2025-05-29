<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Http;

class Category extends Model
{
    protected $fillable = ['name', 'type'];

    public function videos(): BelongsToMany
    {
        return $this->belongsToMany(Video::class, 'category_video');
    }
    public function getTmdbData()
    {
        if (!$this->tmdb_id) return null;

        $apiKey = config('services.tmdb.key');
        $endpoint = $this->type === 'series' ? 'tv' : 'movie';
        $url = "https://api.themoviedb.org/3/{$endpoint}/{$this->tmdb_id}?api_key={$apiKey}&language=en-US";

        try {
            $response = Http::get($url);
            return $response->successful() ? $response->json() : null;
        } catch (\Exception $e) {
            return null;
        }
    }
}
