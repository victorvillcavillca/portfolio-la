<?php

namespace App;

use App\DateFormat;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use DateFormat;
    // protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'specialty_area_id',
        'name',
        'order',
        'slug',
        'description',
        'body',
        'status',
        'file',
        'filename'
    ];

    /**
     * @param date $attr
     * @return Carbon
     */
    public function getCreatedAtAttribute($attr) {
        return Carbon::parse($attr)->diffForHumans();
    }

    //Query Scope
    public function scopeName($query, $name)
    {
        if($name)
            return $query->where('name', 'LIKE', "%$name%");
    }

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

    /**
     * Returns the evaluations models
     * @return \Illuminate\Support\Collection
     */
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}