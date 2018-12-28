<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class CamporiClub extends Model
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
		'code' => 'required',
		'district' => 'required|min:3'
	);

	/**
	 * @param date $attr
	 * @return Carbon
	 */
	public function getCreatedAtAttribute($attr) {
		return Carbon::parse($attr)->format('d.m.Y');
	}

	/**
     * The requirements that belong to the requirements.
     */
    public function requirements()
    {
        return $this->belongsToMany('App\Requirement', 'detail_score', 'campori_club_id', 'requirement_id')->withPivot('score_reached', 'observations')->withTimestamps();
    }
}