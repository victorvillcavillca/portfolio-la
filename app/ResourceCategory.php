<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceCategory extends Model
{
	protected $fillable = [
        'name', 'slug', 'description'
    ];

    /**
     * Returns the resources models
     * @return \Illuminate\Support\Collection
     */
    public function resources()
    {
        return $this->hasMany(Resource::class);
    }
}
