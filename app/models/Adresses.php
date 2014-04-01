<?php

class Adresses extends Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	
	/**
	* Activate soft delete
	*
	* @var boolean
	*/	
	protected $softDelete = true;
	
		
	public function membres(){
    	
    	return $this->belongsToMany('Membres', 'user_membres', 'membre_id', 'adresse_id');
 	}
 	
	public function specialisations(){

    	return $this->belongsToMany('Specialisations', 'user_specialisations', 'specialisation_id', 'adresse_id');
 	}
 	
	public function user()
    {
        return $this->belongsTo('User','user_id');
    }
}
