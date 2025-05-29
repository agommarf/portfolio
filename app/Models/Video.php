<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Video extends Model
{
    protected $fillable = [
        'title',
        'type',
        'vimeo_url',
    ];

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class, 'actor_video');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_video');
    }
}
