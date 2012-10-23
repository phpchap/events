<?php
/**
 * uploadCsv actions.
 *
 * @package    event
 * @subpackage uploadCsv
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class uploadCsvActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) 
    {
        // get the backend form object
        $this->form = new BackendUploadForm;
        // has the form been posted
        if ($request->isMethod('post')) {
            // bind the submitted files into the form
            $this->form->bind($request->getParameter('csvfile'), 
                              $request->getFiles($this->form->getName()));
            // is the file valid
            if ($this->form->isValid()) {

                // get the file
                $file = $this->form->getValue('csvfile');
                // create a new filename
                $filename = 'uploaded_' . sha1($file->getOriginalName());
                $extension = $file->getExtension($file->getOriginalExtension());
                $fileLocation = sfConfig::get('sf_upload_dir') . '/' . $filename . $extension;
                // upload the file
                $file->save($fileLocation);
                // parse the CSV
                $this->processCsv($fileLocation);
            }
        }
    }

    /**
     * parse the file location
     * @param string $fileLocation 
     */
    private function processCsv($fileLocation) 
    {
        // parse the csv
        $csv = new parseCSV();
        echo $fileLocation;
        $csv->auto($fileLocation);

        
    }

}