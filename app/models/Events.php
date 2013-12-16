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
 	
    public function event_options()
    {
        return $this->belongsToMany('Options', 'event_options', 'event_id', 'option_id');
    }
    
    public function event_specialisations()
    {     
        return $this->belongsToMany('Specialisations', 'event_specialisations', 'event_id', 'specialisation_id');
    }
 	
    public function files(){
    	
    	return $this->hasMany('Files', 'event_id');
 	}
	
}
