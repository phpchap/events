<?php

/**
 * BaseEventType
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $short_code
 * 
 * @method string    getName()       Returns the current record's "name" value
 * @method string    getShortCode()  Returns the current record's "short_code" value
 * @method EventType setName()       Sets the current record's "name" value
 * @method EventType setShortCode()  Sets the current record's "short_code" value
 * 
 * @package    event
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEventType extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('event_type');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('short_code', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));

        $this->option('type', 'InnoDB');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $sluggable0 = new Doctrine_Template_Sluggable();
        $this->actAs($timestampable0);
        $this->actAs($sluggable0);
    }
}