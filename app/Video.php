<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
	protected $fillable = [
        'user_id',
        'video_category_id',
        'name',
        'order',
        'slug',
        'url',
        'description',
        'body',
        'status',
        'file',
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
     * Returns the video category model
     * @return App\VideoCategory
     */
    public function videoCategory()
    {
        return $this->belongsTo(VideoCategory::class);
    }

    /**
     * Returns the user model
     * @return App\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}