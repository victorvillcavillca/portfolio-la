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
        'evaluation_category_id'
    ];

    /**
     * Returns evaluationCategory model
     * @return App\evaluationCategory
     */
    public function evaluationCategory()
    {
        return $this->belongsTo(EvaluationCategory::class);
    }

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
