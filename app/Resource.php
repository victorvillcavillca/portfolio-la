<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Resource extends Model
{
    protected $fillable = [
        'user_id',
        'resource_category_id',
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
        return Carbon::parse($attr)->format('d-m-Y');
    }

    /**
     * Returns the resource category model
     * @return App\ResourceCategory
     */
    public function resourceCategory()
    {
        return $this->belongsTo(ResourceCategory::class);
    }

    /**
     * Returns the user model
     * @return App\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Returns the tags models
     * @return \Illuminate\Support\Collection
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
