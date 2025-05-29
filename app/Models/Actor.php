<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Actor extends Model
{
    protected $fillable = ['name'];

    public function videos(): BelongsToMany
    {
        return $this->belongsToMany(Video::class, 'actor_video');
    }
}
