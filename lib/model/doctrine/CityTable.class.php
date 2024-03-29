<?php

/**
 * CityTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CityTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object CityTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('City');
    }
    
    // fetch an organiser by shortcode
    public static function getCityByShortCode($shortCode) 
    {
	// create the queryfilters
	$q = Doctrine_Query::create();
	// select only the bits we need
	$q->from("City c");	
        // add the filters
	$q->addWhere("c.short_code = ?", $shortCode);        
        // get the result
	return $q->fetchOne();		
    }    
}