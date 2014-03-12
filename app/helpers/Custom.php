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
	
	/*  Remove accents */
	
	public function _removeAccents ($text) {
	    $alphabet = array(
	        'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
	        'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
	        'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
	        'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
	        'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
	        'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
	        'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f',
	    );
	
	    $text = strtr ($text, $alphabet);
	
	    // replace all non letters or digits by -
	    $text = preg_replace('/\W+/', '', $text);
	
	    return $text;
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
	
	public function keysort($karr){
	    
	    $ksortedarr = array();
	    
	    foreach($karr as $id => $kcurrkey)
	    {
	    	// remove accents
	    	$currkey = $this->_removeAccents($kcurrkey);
	    	$currkey = strtolower($currkey);
	    	
	        $ksortedarr[$currkey]['title'] = $kcurrkey;
	        $ksortedarr[$currkey]['id']    = $id;
	    }
	    
	    return $ksortedarr;

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