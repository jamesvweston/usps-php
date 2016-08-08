<?php

namespace jamesvweston\USPS\Responses;


use jamesvweston\USPS\Responses\Base\BaseCityStateLookupResponse;
use jamesvweston\Utilities\ArrayUtil AS AU;

class CityStateLookupResponse extends BaseCityStateLookupResponse
{

    /**
     * @param   array   $data
     */
    public function __construct($data)
    {
        $data               = AU::get($data['CityStateLookupResponse'], []);
        $zipCodes           = AU::get($data['ZipCode'], []);
        $zipCodes           = AU::isArrays($zipCodes) ? $zipCodes : [$zipCodes];
        foreach ($zipCodes AS $item)
        {
            $this->items[]  = new CityStateLookupResponseItem($item);
        }
    }

    /**
     * @return array
     */
    function jsonSerialize()
    {
        $object['items']    = [];
        foreach ($this->items AS $item)
        {
            $object['items'][]  = $item->jsonSerialize();
        }
        
        return $object;
    }
}