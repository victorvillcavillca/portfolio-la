<?php

namespace App;
use Carbon\Carbon;

trait DateFormatHuman
{
	/**
     * @param date $attr
     * @return Carbon
     */
    public function getCreatedAtAttribute($attr) {
        return Carbon::parse($attr)->diffForHumans();
    }

	/**
     * @param date $attr
     * @return Carbon
     */
    public function getUpdatedAtAttribute($attr) {
        return Carbon::parse($attr)->diffForHumans();
    }
}