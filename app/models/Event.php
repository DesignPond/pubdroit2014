<?php

class Event extends Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	
	public function compte()
    {
        return $this->hasOne('Compte');
    }
	
}
