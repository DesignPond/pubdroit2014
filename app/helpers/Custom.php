<?php

use Carbon\Carbon;

class Custom {

    public static function formatDate($date) {
    
        $instance   = Carbon::createFromFormat('Y-m-d h:i:s', $date);
		$formatDate = $instance->toDateString();
	
        return $formatDate;
    }
    
}