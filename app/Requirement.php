<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Requirement extends Model
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];

	protected $guarded  = array('id');

	/**
	 * The rules for email field, automatic validation.
	 *
	 * @var array
	*/
	private $rules = array(
		'detail' => 'required|min:5',
        'score' => 'required'
	);

	/**
	 * Get the post's requirementarea.
	 *
	 * @return requirementarea
	 */
	public function requirementarea()
	{
		return $this->belongsTo('App\Requirementarea');
	}

	/**
	 * @param date $attr
	 * @return Carbon
	 */
	public function getCreatedAtAttribute($attr) {
		return Carbon::parse($attr)->format('d.m.Y');
	}
}
