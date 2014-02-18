<?php

use Carbon\Carbon;

class Custom {

    public static function formatDate($date) {
    
        $instance   = Carbon::createFromFormat('Y-m-d', $date); 
		setlocale(LC_TIME, 'fr_FR'); 							                   
		$formatDate = $instance->formatLocalized('%A %d %B %Y'); 
	
        return $formatDate;
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
    
}