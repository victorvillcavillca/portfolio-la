<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['name','slug','description','status','user_id','specialty_id'];

    /**
     * Returns specialty model
     * @return App\Specialty
     */
    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
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
