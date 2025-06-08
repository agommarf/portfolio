<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdeaVote extends Model
{
    // Campos que se pueden asignar masivamente al crear o actualizar un voto
    protected $fillable = ['idea_id', 'session_id', 'value'];

    // Relación inversa: cada voto pertenece a una idea
    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
}
