<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Actor extends Model
{
    // Campos que se pueden asignar masivamente (para crear/actualizar)
    protected $fillable = ['name'];

    // Relación muchos a muchos con la tabla videos
    // Esta función devuelve todos los videos asociados a este actor
    public function videos(): BelongsToMany
    {
        // 'actor_video' es la tabla pivote que une actores y videos
        return $this->belongsToMany(Video::class, 'actor_video');
    }
}
