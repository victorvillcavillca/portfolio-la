<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Club extends Model
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
        'bibleText' => 'min:5',
		'motto' => 'min:5',
		'battleCry' => 'min:5'
	);

	/**
	 * Get the post's district.
	 *
	 * @return District
	 */
	public function church()
	{
		return $this->belongsTo('App\Church');
	}

	/**
	 * @param date $attr
	 * @return Carbon
	 */
	public function getCreatedAtAttribute($attr) {
		return Carbon::parse($attr)->format('d.m.Y');
	}

	/**
	 * @param date $attr
	 * @return Carbon
	 */
	public function getFoundationDateAttribute($attr) {
		return Carbon::parse($attr)->format('d/m/Y');
	}
}
