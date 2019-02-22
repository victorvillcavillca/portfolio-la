<?php

namespace App;

use App\DateFormat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourceCategory extends Model
{
    use DateFormat, SoftDeletes;

	protected $fillable = [
        'user_id', 'name', 'slug', 'description'
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
