<?php

use Carbon\Carbon;
use Civilites as Civilites;
use Cantons as Cantons;
use Professions as Professions;
use Pays as Pays;

class Custom {

    public static function formatDate($date) {
    
        $instance   = Carbon::createFromFormat('Y-m-d', $date); 
		setlocale(LC_TIME, 'fr_FR'); 							                   
		$formatDate = $instance->formatLocalized('%A %d %B %Y'); 
	
        return $formatDate;
    }
    
	public function getCreatedAtAttribute($value) { //created_at field in DB
        //return $carbonDate = Carbon::createFromFormat('Y-m-d H:i:s', $value);	
        return $carbonDate = date("d/m/Y", strtotime($value)); 
        //return $value;
    }
    
    public static function ifExist(&$argument, $default="") {
    
	    if(!isset($argument)) {
	       $argument = $default;
	       return $argument;
	    }
	   
	    $argument = trim($argument);
	   
	    return $argument;
	}
	
	public static function preparePrice($price){
		
		$prepared = explode('.', $price);
		
		return $prepared;
	}
	
	public function limit_words($string, $word_limit){
	
		$words = explode(" ",$string);
		$new = implode(" ",array_splice($words,0,$word_limit));
		if( !empty($new) ){
			$new = $new.'...';
		}
		return $new;
	}
	
	/**
	 * Sort array by key
	 *
	 * @return array
	 */		
	public function knatsort(&$karr)
	{
	    $kkeyarr = array_keys($karr);
	    
	    natcasesort($kkeyarr);
	    $ksortedarr = array();
	    
	    foreach($kkeyarr as $kcurrkey){
	        $ksortedarr[$kcurrkey] = $karr[$kcurrkey];
	    }
	    
	    $karr = $ksortedarr;
	    return true;
	}
	
	/**
	 * Return the name of the title (civilité)
	 *
	 * @return string
	 */	
	public function whatCivilite($title){
		
		$civilites = \Civilites::all()->lists('title','id');
		
		return (isset($civilites[$title]) ? $civilites[$title] : "");		
	}
	
	/**
	 * Return the name of the title (professsion)
	 *
	 * @return string 
	 */	
	public function whatProfession($title){
		
		$professions = \Professions::all()->lists('titreProfession','id');

		return (isset($professions[$title]) ? $professions[$title] : "");			
	}    
		
	/**
	 * Return the name of the title (canton)
	 *
	 * @return string 
	 */	
	public function whatCanton($title){
		
		$cantons = \Cantons::all()->lists('titreCanton','id');

		return (isset($cantons[$title]) ? $cantons[$title] : "");	
	} 
			
	/**
	 * Return the name of the title (canton)
	 *
	 * @return string 
	 */	
	public function whatPays($title){
		
		$pays = \Pays::all()->lists('titrePays','id');

		return (isset($pays[$title]) ? $pays[$title] : "");	
	} 
	
			
	/**
	 * Return the name of the title (type of adresse)
	 *
	 * @return string 
	 */	
	public function whatType($title){
		
		$types = \Adresse_types::all()->lists('type','id');

		return (isset($types[$title]) ? $types[$title] : "");	
	} 
	
}