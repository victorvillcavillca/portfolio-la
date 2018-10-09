<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{        
    protected $fillable = [
        'user_id', 'resource_category_id', 'name', 'slug', 'description', 'body', 'status', 'file'
    ];
    
    /**
     * Returns the resource category model
     * @return App\Patient
     */
    public function resourceCategory()
    {
        return $this->belongsTo(ResourceCategory::class);
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
     * Returns the tags models
     * @return \Illuminate\Support\Collection
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
