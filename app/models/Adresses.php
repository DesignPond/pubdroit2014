<?php

class Adresses extends Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
		
	public function membres(){
    	
    	return $this->belongsToMany('Membres', 'user_membres', 'membre_id', 'adresse_id');
 	}
 	
	public function specialisations(){

    	return $this->belongsToMany('Specialisations', 'user_specialisations', 'specialisation_id', 'adresse_id');
 	}
	
}
