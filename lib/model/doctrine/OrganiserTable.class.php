<?php

/**
 * OrganiserTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class OrganiserTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object OrganiserTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Organiser');
    }
    
    // fetch an organiser by shortcode
    public static function getOrganiserByShortCode($shortCode) 
    {
	// create the queryfilters
	$q = Doctrine_Query::create();
	// select only the bits we need
	$q->from("Organiser o");	
        // add the filters
	$q->addWhere("o.short_code = ?", $shortCode);
        // get the result
	return $q->fetchOne();		
    }
}