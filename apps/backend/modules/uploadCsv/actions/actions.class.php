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
    public function executeIndex(sfWebRequest $request) {
        // get the backend form object
        $this->form = new BackendUploadForm;
        // has the form been posted
        if ($request->isMethod('post')) {
            // bind the submitted files into the form
            $this->form->bind($request->getParameter('csvfile'), $request->getFiles($this->form->getName()));
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
    private function processCsv($fileLocation) {
        // parse the csv
        $csv = new parseCSV();
        $csv->auto($fileLocation);

        // check we have data
        if (count($csv->data) > 0) {
            $i = 0;
            foreach ($csv->data as $row) {
                if($i == 0) {
                    // header
                } else {
                    // csv data
                    echo "<pre>";
                    if($this->processRow($row)) {
                        
                    } else {
                        
                    }
                                        
                }
                $i++;                
            }
        }
    }

    // process the row
    private function processRow($row) {
        /*
        echo "<pre>";
        print_r($row);
        die;
         * 
         */
        // get the start/end date
        if(strstr($row['Dates'], "-")) {
                    
            list($start, $end) = explode("-", $row['Dates']);
            // format it for mysql
            $startDate = Tools::getCurrentDatetime(strtotime($start));
            $endDate = Tools::getCurrentDatetime(strtotime($end));
        } else {
            $startDate = "";
            $endDate = "";
            
        }
        
        
        // grab the id's
        $organiserId    = $this->processOrganizerName($row['Organizer Name']);
        $industryId     = $this->processIndustry($row['Industry']);
        $countryId      = $this->processCountry($row['Country']); 
        $cityId         = $this->processCity($row['City']); 
        $regionId       = $this->processRegion($row['Region']); 
        $typeId         = $this->processType($row['Type']); 
        $eventName      = $row['Event Name'];
        $website        = $row['Website'];
        
        //  
        if($organiserId != "" && $industryId != "" && $regionId != "" && 
           $typeId != "" && $countryId != "" && $cityId != "") {

            // 
            $this->processEvent($organiserId, $industryId, $countryId,
                                $cityId, $regionId, $typeId, 
                                $eventName, $website, $startDate, 
                                $endDate);            

        }
        
    }

    /**
     * return the columns of the CSV
     * @param array $csvData
     * @return array 
     */
    private function getCSVHeader($csvData) {
        return $csvData[0];
    }

    private function processLogo($value) 
    {
        echo "<br/>".__FUNCTION__." :: ".$value;
    }
    
    // process the organiser name
    private function processOrganizerName($value) 
    {        
        if($value == "") {
            return false;
        }
        
        // check for existing organiser name
        $shortCode = Tools::slugify($value);        
        $organiserObj = OrganiserTable::getOrganiserByShortCode($shortCode);

        // new organiser?
        if($organiserObj == false) {
            $organiser = new Organiser;
            $organiser->setName($value);
            $organiser->setShortCode($shortCode);            
            $organiser->save();
            $id = $organiser->getId(); 
        } else {
            $id = $organiserObj->getId();
        }
        return $id;
    }
    
    // process industry
    private function processIndustry($value) 
    {
        if($value == "") {
            return false;
        }
        
        // convert to short code
        $shortCode = Tools::slugify($value);
        $industryObj = IndustryTable::getIndustryByShortCode($shortCode);
        // new industry?
        if($industryObj == false) {
            $industry = new Industry;
            $industry->setName($value);
            $industry->setShortCode($shortCode);
            $industry->save();
            $industryId = $industry->getId();
        } else {
            $industryId = $industryObj->getId();
        }
        // return industryId
        return $industryId;
    }
    
    // process country
    private function processCountry($value) 
    {
        if($value == "") {
            return false;
        }
        
        // convert to short code
        $shortCode = Tools::slugify($value);
        $countryObj = CountryTable::getCountryByShortCode($shortCode);
        // new industry?
        if($countryObj == false) {
            $country = new Country;
            $country->setName($value);
            $country->setShortCode($shortCode);
            $country->save();
            $countryId = $country->getId();
        } else {
            $countryId = $countryObj->getId();
        }
        // return countryCheck
        return $countryId;        
    }
    
    // process city
    private function processCity($value) 
    {
        if($value == "") {
            return false;
        }
        
        // convert to short code
        $shortCode = Tools::slugify($value);
        $cityObj = CityTable::getCityByShortCode($shortCode);

        // new city?
        if($cityObj == false) {
            $city = new City;
            $city->setName($value);
            $city->setShortCode($shortCode);           
            $city->save();
            $cityId = $city->getId();
        } else {
            $cityId = $cityObj->getId();
        }
        // return cityId
        return $cityId;        
    }
    
    private function processRegion($value) 
    {
        if($value == "") {
            return false;
        }
        
        // convert to short code
        $shortCode = Tools::slugify($value);
        $regionObj = RegionTable::getRegionByShortCode($shortCode);
        // new city?
        if($regionObj == false) {
            $region = new Region;
            $region->setName($value);
            $region->setShortCode($shortCode);
            $region->save();
            $regionId = $region->getId();
        } else {
            $regionId = $regionObj->getId();
        }
        // return regionId
        return $regionId;
    }
    
    private function processDates($value) 
    {
        explode("|", print_r($value));        
    }
    
    private function processType($value) 
    {
        if($value == "") {
            return false;
        }
        
        // convert to short code
        $shortCode = Tools::slugify($value);
        $eventTypeObj = EventTypeTable::getEventTypeByShortCode($shortCode);
        // new event type?
        if($eventTypeObj == false) {
            $eventType = new EventType;
            $eventType->setName($value);
            $eventType->setShortCode($shortCode);
            $eventType->save();
            $eventId = $eventType->getId();
        } else {
            $eventId = $eventTypeObj->getId();
        }
        // return cityId
        return $eventId;        
    }

    
    // event stuff    
    private function processEvent($organiserId, $industryId, $countryId, 
                                  $cityId, $regionId, $typeId, 
                                  $eventName, $website, $startDate, 
                                  $endDate) 
    {
        // create a new event
        $event = new Event;
        // set everything..
        $event->organiser_id = $organiserId;
        $event->industry_id = $industryId;
        $event->country_id = $countryId;
        $event->city_id = $cityId;
        $event->region_id = $regionId;
        $event->event_type_id = $typeId;
        $event->name = $eventName;
        $event->website = $website;
        $event->event_start = $startDate;        
        $event->event_end = $endDate;
        //
        $event->save();
    }
    
    
}