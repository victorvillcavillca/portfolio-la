<?php

namespace App;

use App\DateFormat;
use Illuminate\Database\Eloquent\Model;

class SpecialtyArea extends Model
{
    use DateFormat;

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
