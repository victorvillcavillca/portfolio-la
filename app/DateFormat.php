<?php

namespace App;
use Carbon\Carbon;

trait DateFormat
{
	/**
     * @param date $attr
     * @return Carbon
     */
    public function getCreatedAtAttribute($attr) {
        return Carbon::parse($attr)->format('d-m-Y');
    }

	/**
     * @param date $attr
     * @return Carbon
     */
    public function getUpdatedAtAttribute($attr) {
        return Carbon::parse($attr)->format('d-m-Y');
    }
}