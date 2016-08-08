<?php

namespace jamesvweston\USPS\Responses;


use jamesvweston\USPS\Responses\Base\BaseCityStateLookupResponseItem;
use jamesvweston\Utilities\ArrayUtil AS AU;

class CityStateLookupResponseItem extends BaseCityStateLookupResponseItem
{

    /**
     * ZipCodeLookupResponseItem constructor.
     * @param   array   $data
     */
    public function __construct($data)
    {
        $this->zip5                     = AU::get($data['Zip5']);
        $this->city                     = AU::get($data['City']);
        $this->state                    = AU::get($data['State']);

        if (!is_null(AU::get($data['Source'])))
            $this->uspsError            = new USPSError($data);
        if (!is_null(AU::get($data['Error'])))
            $this->uspsError            = new USPSError($data['Error']);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['zip5']                 = $this->zip5;
        $object['city']                 = $this->city;
        $object['state']                = $this->state;
        $object['uspsError']            = !is_null($this->uspsError) ? $this->uspsError->jsonSerialize() : null;
        
        return $object;
    }
}