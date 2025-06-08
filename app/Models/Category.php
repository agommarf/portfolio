<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Http;

class Category extends Model
{
    // Campos que podemos asignar masivamente al crear o actualizar categoría
    protected $fillable = ['name', 'type'];

    // Relación muchos a muchos con videos
    // Esta función trae todos los videos relacionados con esta categoría
    public function videos(): BelongsToMany
    {
        // 'category_video' es la tabla pivote que conecta categorías y videos
        return $this->belongsToMany(Video::class, 'category_video');
    }

    // Método para obtener datos desde la API de TMDb según el ID de TMDb guardado
    public function getTmdbData()
    {
        // Si no tenemos tmdb_id, no hay nada que buscar, devolvemos null
        if (!$this->tmdb_id) return null;

        // Obtenemos la API key desde la configuración (services.php)
        $apiKey = config('services.tmdb.key');

        // Dependiendo del tipo, elegimos el endpoint correcto (series o películas)
        $endpoint = $this->type === 'series' ? 'tv' : 'movie';

        // Construimos la URL para consultar la API con el ID de TMDb y la key
        $url = "https://api.themoviedb.org/3/{$endpoint}/{$this->tmdb_id}?api_key={$apiKey}&language=en-US";

        try {
            // Hacemos la petición GET a la API usando Http facade de Laravel
            $response = Http::get($url);

            // Si la respuesta fue exitosa, devolvemos los datos en formato JSON
            // Si no, devolvemos null para indicar que no se obtuvo info
            return $response->successful() ? $response->json() : null;
        } catch (\Exception $e) {
            // Si algo falla en la petición (problema red, etc), devolvemos null
            return null;
        }
    }
}
