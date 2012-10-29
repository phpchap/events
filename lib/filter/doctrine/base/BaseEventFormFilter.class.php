<?php

/**
 * Event filter form base class.
 *
 * @package    event
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEventFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'website'       => new sfWidgetFormFilterInput(),
      'status'        => new sfWidgetFormChoice(array('choices' => array('' => '', 0 => 0, 1 => 1))),
      'type'          => new sfWidgetFormChoice(array('choices' => array('' => '', 'feed' => 'feed', 'database' => 'database'))),
      'industry_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Industry'), 'add_empty' => true)),
      'organiser_id'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'event_type_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'country_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => true)),
      'region_id'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'city_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('City'), 'add_empty' => true)),
      'logo'          => new sfWidgetFormFilterInput(),
      'event_start'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'event_end'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'          => new sfValidatorPass(array('required' => false)),
      'website'       => new sfValidatorPass(array('required' => false)),
      'status'        => new sfValidatorChoice(array('required' => false, 'choices' => array(0 => 0, 1 => 1))),
      'type'          => new sfValidatorChoice(array('required' => false, 'choices' => array('feed' => 'feed', 'database' => 'database'))),
      'industry_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Industry'), 'column' => 'id')),
      'organiser_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'event_type_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'country_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Country'), 'column' => 'id')),
      'region_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'city_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('City'), 'column' => 'id')),
      'logo'          => new sfValidatorPass(array('required' => false)),
      'event_start'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'event_end'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('event_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Event';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'name'          => 'Text',
      'website'       => 'Text',
      'status'        => 'Enum',
      'type'          => 'Enum',
      'industry_id'   => 'ForeignKey',
      'organiser_id'  => 'Number',
      'event_type_id' => 'Number',
      'country_id'    => 'ForeignKey',
      'region_id'     => 'Number',
      'city_id'       => 'ForeignKey',
      'logo'          => 'Text',
      'event_start'   => 'Date',
      'event_end'     => 'Date',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
      'slug'          => 'Text',
    );
  }
}
