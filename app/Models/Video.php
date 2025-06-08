<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Video extends Model
{
    // Campos que se pueden asignar en masa al crear o actualizar un video
    protected $fillable = [
        'title',      // título del video
        'type',       // tipo: 'edit' o 'meme'
        'vimeo_url',  // URL del video en Vimeo
    ];

    // Relación muchos a muchos con actores, usando tabla pivot 'actor_video'
    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class, 'actor_video');
    }

    // Relación muchos a muchos con categorías, usando tabla pivot 'category_video'
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_video');
    }
}
