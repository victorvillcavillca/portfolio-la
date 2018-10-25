<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
        'user_id', 'category_id', 'name', 'slug', 'excerpt', 'body', 'status', 'file'
    ];

    public function scopeApproved($query)
    {
        return $query->where('is_approved', 1);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'PUBLISHED');
    }

    /**
     * Returns category model
     * @return App\Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
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

    /**
     * Returns the comments models
     * @return \Illuminate\Support\Collection
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}