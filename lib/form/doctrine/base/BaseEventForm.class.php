<?php

/**
 * Event form base class.
 *
 * @method Event getObject() Returns the current form's model object
 *
 * @package    event
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEventForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'name'          => new sfWidgetFormInputText(),
      'website'       => new sfWidgetFormInputText(),
      'status'        => new sfWidgetFormChoice(array('choices' => array(0 => 0, 1 => 1))),
      'type'          => new sfWidgetFormChoice(array('choices' => array('feed' => 'feed', 'database' => 'database'))),
      'industry_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Industry'), 'add_empty' => false)),
      'organiser_id'  => new sfWidgetFormInputText(),
      'event_type_id' => new sfWidgetFormInputText(),
      'country_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => false)),
      'region_id'     => new sfWidgetFormInputText(),
      'city_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('City'), 'add_empty' => false)),
      'logo'          => new sfWidgetFormInputText(),
      'event_start'   => new sfWidgetFormInputText(),
      'event_end'     => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'slug'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'          => new sfValidatorString(array('max_length' => 255)),
      'website'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'status'        => new sfValidatorChoice(array('choices' => array(0 => 0, 1 => 1))),
      'type'          => new sfValidatorChoice(array('choices' => array(0 => 'feed', 1 => 'database'), 'required' => false)),
      'industry_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Industry'))),
      'organiser_id'  => new sfValidatorInteger(),
      'event_type_id' => new sfValidatorInteger(),
      'country_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Country'))),
      'region_id'     => new sfValidatorInteger(),
      'city_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('City'))),
      'logo'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'event_start'   => new sfValidatorPass(array('required' => false)),
      'event_end'     => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
      'slug'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Event', 'column' => array('name'))),
        new sfValidatorDoctrineUnique(array('model' => 'Event', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('event[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Event';
  }

}
