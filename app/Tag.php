<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    /**
     * Returns the posts models
     * @return \Illuminate\Support\Collection
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
