<?php

class Eventsoptions extends Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	
	public function event()
    {
        return $this->belongsTo('events', 'event_id');
    }
    
}
