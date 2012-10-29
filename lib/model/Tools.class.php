<?php

class Tools 
{

    /**
     * Modifies a string to remove all non ASCII characters and spaces.
     */
    public static function slugify($text)
    {
        // replace ampersands
        $text = str_replace("&", "AND", $text);
        
	// replace non letter or digits by -
	$text = preg_replace('~[^\\pL\d]+~u', '-', $text);

	// trim
	$text = trim($text, '-');

	// transliterate
	if (function_exists('iconv')) {
	    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	}

	// lowercase
	$text = strtolower($text);

	// remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);
	
        // go up!
        $text = strtoupper($text);
        
	return $text;
    }    
    
    /**
     * when we're creating a new post in the frontend we need the current 
     * date to make the articles 'live' 
     * @return datetime 
     */
    public static function getCurrentDatetime($time="")
    {
	// check if the timestamp is empty, if so- use the current time()
	if($time === "") {
	    $time = time();
	}
	return date("Y-m-d H:i:s", $time);
    }
        
}