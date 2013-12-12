<?php

class Events extends Eloquent {

	protected $guarded   = array('id');
	//protected $dates     = array('dateDebut','dateFin','dateDelai');
	public static $rules = array();
	
	public function compte()
    {
        return $this->hasOne('Compte');
    }
    
    public function prices(){
    	
    	return $this->hasMany('Prices', 'event_id');
 	}
 	
    public function eventsoptions(){
    	
    	return $this->hasMany('Eventsoptions', 'event_id');
 	}
	
}
