<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable = [
        'user_id', 'specialty_area_id', 'name', 'slug', 'description', 'body', 'status', 'file'
    ];
    
    /**
     * Returns the specialty area model
     * @return App\SpecialtyArea
     */
    public function specialtyArea()
    {
        return $this->belongsTo(SpecialtyArea::class);
    }

    /**
     * Returns the user model
     * @return App\Patient
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
