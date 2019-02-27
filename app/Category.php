<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug', 'body'
    ];

    /**
     * @param date $attr
     * @return Carbon
     */
    public function getCreatedAtAttribute($attr) {
        return Carbon::parse($attr)->format('d.m.Y');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
