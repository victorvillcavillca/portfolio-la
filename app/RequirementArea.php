<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class RequirementArea extends Model
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
		'name' => 'required|min:5',
		'total_score' => 'required'
	);

	/**
	 * @param date $attr
	 * @return Carbon
	 */
	public function getCreatedAtAttribute($attr) {
		return Carbon::parse($attr)->format('d.m.Y');
	}

	/**
     * Get the requirements for the requirement area.
     */
    public function requirements()
    {
        return $this->hasMany('App\Requirement');
    }
}