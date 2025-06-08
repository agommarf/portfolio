<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    // Campos que se pueden asignar masivamente al crear o actualizar una idea
    protected $fillable = ['title', 'description', 'votes'];

    // Relación uno a muchos con votos de la idea
    // Esto nos permite obtener todos los votos asociados a esta idea
    public function votes()
    {
        return $this->hasMany(IdeaVote::class);
    }
}
