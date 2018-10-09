<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialtyArea extends Model
{
    protected $fillable = [
        'name', 'slug', 'description'
    ];

    /**
     * Returns the specialties models
     * @return \Illuminate\Support\Collection
     */
    public function specialties()
    {
        return $this->hasMany(Specialty::class);
    }
}
