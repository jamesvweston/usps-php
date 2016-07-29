<?php

namespace jamesvweston\USPS\Models\Responses;


class ZipCodeLookUpResponse implements \JsonSerializable
{

    /**
     * @var CityStateZipResponse[]
     */
    protected $cityStateZipResponses;


    public function __construct()
    {

    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['cityStateZipResponses'] = [];

        foreach ($this->cityStateZipResponses AS $item)
        {
            $object['cityStateZipResponses'][] = $item->jsonSerialize();
        }

        return $object;
    }

    /**
     * @return CityStateZipResponse[]
     */
    public function getAddressResponses()
    {
        return $this->cityStateZipResponses;
    }

    /**
     * @param CityStateZipResponse $cityStateZipResponses
     */
    public function addCityStateZipResponse(CityStateZipResponse $cityStateZipResponses)
    {
        $this->cityStateZipResponses[]  = $cityStateZipResponses;
    }
    
}