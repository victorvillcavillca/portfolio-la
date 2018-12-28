<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'time',
        'end_date',
        'user_id',
        'matter_id'
    ];

    /**
     * Returns matter model
     * @return App\Matter
     */
    public function matter()
    {
        return $this->belongsTo(Matter::class);
    }

    /**
     * Returns the questions models
     * @return \Illuminate\Support\Collection
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
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
     * Returns the users models
     * @return \Illuminate\Support\Collection
     */
    public function participants()
    {
        return $this->belongsToMany(User::class);
    }
}
