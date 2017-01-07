<?php 

//namespace Helpers;
//use Log; //Import logger
//use DateTime;

class Helper {

    public static function helloWorld() {
        return 'Hello World';
    }
    
    public static function isValidDate($format='Ymd', $date){
	    	$f = DateTime::createFromFormat($format, $date);
	    	$valid = DateTime::getLastErrors();
    	return ($valid['warning_count']==0 and $valid['error_count']==0);
    }

    public static function startsWith($haystack, $needle) {
	     $length = strlen($needle);
	     return (substr($haystack, 0, $length) === $needle);
	}


	public static function endsWith($haystack, $needle){
	    $length = strlen($needle);
	    if ($length == 0) {
	        return true;
	    }

	    return (substr($haystack, -$length) === $needle);
	}
	
	public static function countValues($array, $checkValue){
		$counter = 0;
		foreach($array as $valor){			
			if($valor === $checkValue){
				$counter++;
			}			
		}
			
		return ($counter);
	}

	/*FUNCIONES RELATIVAS A PARSEO DATOS */
	


}


