<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Returns the posts models
     * @return \Illuminate\Support\Collection
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Returns the questions models
     * @return \Illuminate\Support\Collection
     */
    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    /**
     * Returns the evaluations models
     * @return \Illuminate\Support\Collection
     */
    public function evaluations()
    {
        return $this->belongsToMany(Evaluation::class);
    }
}