<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment','post_id','user_id'];

    /**
     * Returns the post model
     * @return App\Post
     */
    public function post()
    {
    	return $this->belongsTo(Post::class);
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
