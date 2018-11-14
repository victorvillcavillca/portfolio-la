<?php

namespace App;

use App\DateFormat;
use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    use DateFormat;

    protected $fillable = [
        'name', 'slug', 'description','management_id'
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
