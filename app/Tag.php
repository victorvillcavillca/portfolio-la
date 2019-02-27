<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    /**
     * @param date $attr
     * @return Carbon
     */
    public function getCreatedAtAttribute($attr) {
        return Carbon::parse($attr)->format('d.m.Y');
    }

    /**
     * Returns the posts models
     * @return \Illuminate\Support\Collection
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
