<?php

namespace App;

use App\DateFormat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoCategory extends Model
{
    use DateFormat, SoftDeletes;

	protected $fillable = [
        'user_id', 'name', 'slug', 'description'
    ];

    /**
     * Returns the videos models
     * @return \Illuminate\Support\Collection
     */
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
