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

    /**
     * Returns the users models
     * @return \Illuminate\Support\Collection
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'matter_user')->withPivot('approved','accepted','final_score','evaluation_date')->withTimestamps();


        // return $this->belongsToMany('App\Product', 'detail_sell', 'sell_product_id', 'product_id')->withPivot('quantity', 'subtotal')->withTimestamps();
    }

    /**
     * The services that belong to the functions.
     */
    // public function services()
    // {
    //     return $this->belongsToMany('App\Service', 'function_service', 'function_id', 'service_id')->withTimestamps();
    // }
}