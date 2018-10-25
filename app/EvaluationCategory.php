<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluationCategory extends Model
{
	protected $fillable = [
        'name', 'slug', 'description'
    ];

    /**
     * Returns the evaluations models
     * @return \Illuminate\Support\Collection
     */
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}