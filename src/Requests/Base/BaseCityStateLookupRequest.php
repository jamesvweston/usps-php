<?php

namespace jamesvweston\USPS\Requests\Base;


use jamesvweston\USPS\Requests\Contracts\CityStateLookupRequest AS CityStateLookupRequestContract;

abstract class BaseCityStateLookupRequest implements CityStateLookupRequestContract
{

    /**
     * @var string[]
     */
    protected $zipCodes     = [];

    /**
     * @return string[]
     */
    public function getZipCodes()
    {
        return $this->zipCodes;
    }
    
    public function addZipCode($zipCode)
    {
        $this->zipCodes[]       = $zipCode;
    }

    /**
     * @param string[] $zipCodes
     */
    public function setZipCodes($zipCodes)
    {
        $this->zipCodes         = $zipCodes;
    }
}