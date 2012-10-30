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
        // init the arrays
        $this->errors  = array();
        $this->successes = array();        
        
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
            $i = 1;
            foreach ($csv->data as $row) {
                // try processing the row
                try {
                    // ignore the header
                    if($i > 1) {
                        // process the header
                        if ($this->processRow($row)) {
                            // successfully added event
                            $this->successes[] = "successfully added Event ".$row['Event Name']." (row " . $i.")";                                                        
                        } else {
                            // something went wrong
                            $this->errors[] = "row " . $i . " could not save event";
                        }                        
                    } else {
                        // somethings a bit wonky with the CSV parser..
                        $i++;
                    }                   
                } catch (Exception $e) {
                    // add to the error array
                    $this->errors[] = "row " . $i . " skipped, because " . $e->getMessage();
                }
                // bump counter
                $i++;
            }
        }
    }

    // process the row
    private function processRow($row) {

        // get the start/end date
        if (strstr($row['Dates'], "-")) {
            list($start, $end) = explode("-", $row['Dates']);
            // format it for mysql
            $startDate = Tools::getCurrentDatetime(strtotime($start));
            $endDate = Tools::getCurrentDatetime(strtotime($end));
        } else {
            $startDate = "";
            $endDate = "";
        }

        // grab the id's
        $organiserId = $this->processOrganizerName($row['Organizer Name']);
        $industryId = $this->processIndustry($row['Industry']);
        $countryId = $this->processCountry($row['Country']);
        $cityId = $this->processCity($row['City']);
        $regionId = $this->processRegion($row['Region']);
        $typeId = $this->processType($row['Type']);
        $eventName = $row['Event Name'];
        $website = $row['Website'];

        //  
        if ($organiserId != "" && $industryId != "" && $regionId != "" &&
                $typeId != "" && $countryId != "" && $cityId != "") {

            // 
            return $this->processEvent($organiserId, $industryId, $countryId, 
                                       $cityId, $regionId, $typeId, 
                                       $eventName, $website, $startDate, 
                                       $endDate);
        } else {
            throw new Exception("Too many CSV row items were empty");
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

    private function processLogo($value) {
        echo "<br/>" . __FUNCTION__ . " :: " . $value;
    }

    // process the organiser name
    private function processOrganizerName($value) {
        if ($value == "") {
            throw new Exception("Organiser is empty");
        }

        // check for existing organiser name
        $shortCode = Tools::slugify($value);
        $organiserObj = OrganiserTable::getOrganiserByShortCode($shortCode);

        // new organiser?
        if ($organiserObj == false) {
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
    private function processIndustry($value) {
        if ($value == "") {
            throw new Exception("Industry is empty");
        }

        // convert to short code
        $shortCode = Tools::slugify($value);
        $industryObj = IndustryTable::getIndustryByShortCode($shortCode);
        // new industry?
        if ($industryObj == false) {
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
    private function processCountry($value) {
        if ($value == "") {
            throw new Exception("Country is empty");
        }

        // convert to short code
        $shortCode = Tools::slugify($value);
        $countryObj = CountryTable::getCountryByShortCode($shortCode);
        // new industry?
        if ($countryObj == false) {
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
    private function processCity($value) {
        if ($value == "") {
            throw new Exception("City is empty");
        }

        // convert to short code
        $shortCode = Tools::slugify($value);
        $cityObj = CityTable::getCityByShortCode($shortCode);

        // new city?
        if ($cityObj == false) {
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

    private function processRegion($value) {
        if ($value == "") {
            throw new Exception("Region is empty");
        }

        // convert to short code
        $shortCode = Tools::slugify($value);
        $regionObj = RegionTable::getRegionByShortCode($shortCode);
        // new city?
        if ($regionObj == false) {
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

    private function processDates($value) {
        explode("|", print_r($value));
    }

    private function processType($value) {
        if ($value == "") {
            throw new Exception("Event type is empty");
        }

        // convert to short code
        $shortCode = Tools::slugify($value);
        $eventTypeObj = EventTypeTable::getEventTypeByShortCode($shortCode);
        // new event type?
        if ($eventTypeObj == false) {
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

    // create the event
    private function processEvent($organiserId, $industryId, $countryId, 
                                  $cityId, $regionId, $typeId, 
                                  $eventName, $website, $startDate, 
                                  $endDate) {
        
        // check the exist doesnt already exist
        $event = EventTable::getCheckExistingEvent($organiserId, $industryId, $countryId, 
                                                   $cityId, $regionId, $typeId, 
                                                   $eventName);

        // if the event exists, dont do shit.. 
        if ($event instanceof Event) {
            // event already exists
            throw new Exception("Event: ".$eventName." already exists");
        } else {
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

        return true;
    }

}