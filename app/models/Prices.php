<?php

class Prices extends Eloquent {

	protected $guarded   = array('id');

	public static $rules = array();
	
	public function event()
    {
        return $this->belongsTo('events', 'event_id');
    }
}
