<?php

/**
 * Event form.
 *
 * @package    event
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BackendUploadForm extends sfForm {

    /**
     * create the widgets, validators and set the name format 
     */
    public function configure() {
        
        $this->disableCSRFProtection();
        $this->setWidgets(array(
            'csvfile' => new sfWidgetFormInputFile(array('label' => 'Select a Csv file for upload')),
        ));

        $this->validatorSchema['csvfile'] = new sfValidatorFile(
            array('required' => false,
                  'path' => sfConfig::get('sf_upload_dir').'/assets/csv',
                  'mime_types' => array('text/plain',
                                        'text/csv',
                                        'text/comma-separated-values',
                                        'application/csv', 
                                        'application/excel', 
                                        'application/vnd.ms-excel', 
                                        'application/vnd.msexcel'),
                ),
            array('invalid' => 'Please select only a csv file for upload.',
                               'required' => 'Select a file to upload.',
                               'mime_types' => 'The file must be a csv file .'));

        $this->widgetSchema->setNameFormat('csv[%s]');
        
    }

}
