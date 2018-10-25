<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question',
    	'option_1',
    	'option_2',
    	'option_3',
    	'option_4',
    	'answer',
    	'status',
    	'user_id',
    	'evaluation_id'
    ];

    /**
     * Returns evaluation model
     * @return App\Evaluation
     */
    public function evaluation()
    {
    	return $this->belongsTo(Evaluation::class);
    }
}
