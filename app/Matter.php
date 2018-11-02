<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    protected $fillable = [
        'name', 'slug', 'description'
    ];

    /**
     * Returns the evaluations models
     * @return \Illuminate\Support\Collection
     */
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    /**
     * Returns the users models
     * @return \Illuminate\Support\Collection
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'matter_user')->withPivot('approved','accepted','final_score','evaluation_date')->withTimestamps();
    }
}
