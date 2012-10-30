<?php

/**
 * event module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage event
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseEventGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%id%% - %%name%% - %%website%% - %%status%% - %%type%% - %%industry_id%% - %%organiser_id%% - %%event_type_id%% - %%country_id%% - %%region_id%% - %%city_id%% - %%logo%% - %%event_start%% - %%event_end%% - %%created_at%% - %%updated_at%% - %%slug%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Event List';
  }

  public function getEditTitle()
  {
    return 'Edit Event';
  }

  public function getNewTitle()
  {
    return 'New Event';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => 'id',  1 => 'name',  2 => 'website',  3 => 'status',  4 => 'type',  5 => 'industry_id',  6 => 'organiser_id',  7 => 'event_type_id',  8 => 'country_id',  9 => 'region_id',  10 => 'city_id',  11 => 'logo',  12 => 'event_start',  13 => 'event_end',  14 => 'created_at',  15 => 'updated_at',  16 => 'slug',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'name' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'website' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'status' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Enum',),
      'type' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Enum',),
      'industry_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'organiser_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'event_type_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'country_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'region_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'city_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'logo' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'event_start' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'event_end' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'slug' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'name' => array(),
      'website' => array(),
      'status' => array(),
      'type' => array(),
      'industry_id' => array(),
      'organiser_id' => array(),
      'event_type_id' => array(),
      'country_id' => array(),
      'region_id' => array(),
      'city_id' => array(),
      'logo' => array(),
      'event_start' => array(),
      'event_end' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'slug' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'name' => array(),
      'website' => array(),
      'status' => array(),
      'type' => array(),
      'industry_id' => array(),
      'organiser_id' => array(),
      'event_type_id' => array(),
      'country_id' => array(),
      'region_id' => array(),
      'city_id' => array(),
      'logo' => array(),
      'event_start' => array(),
      'event_end' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'slug' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'name' => array(),
      'website' => array(),
      'status' => array(),
      'type' => array(),
      'industry_id' => array(),
      'organiser_id' => array(),
      'event_type_id' => array(),
      'country_id' => array(),
      'region_id' => array(),
      'city_id' => array(),
      'logo' => array(),
      'event_start' => array(),
      'event_end' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'slug' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'name' => array(),
      'website' => array(),
      'status' => array(),
      'type' => array(),
      'industry_id' => array(),
      'organiser_id' => array(),
      'event_type_id' => array(),
      'country_id' => array(),
      'region_id' => array(),
      'city_id' => array(),
      'logo' => array(),
      'event_start' => array(),
      'event_end' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'slug' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'name' => array(),
      'website' => array(),
      'status' => array(),
      'type' => array(),
      'industry_id' => array(),
      'organiser_id' => array(),
      'event_type_id' => array(),
      'country_id' => array(),
      'region_id' => array(),
      'city_id' => array(),
      'logo' => array(),
      'event_start' => array(),
      'event_end' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'slug' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'EventForm';
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'EventFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array(null, null);
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }
}
