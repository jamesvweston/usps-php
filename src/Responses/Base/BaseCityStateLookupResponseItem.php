<?php

namespace jamesvweston\USPS\Responses\Base;


use jamesvweston\USPS\Responses\Contracts\CityStateLookupResponseItem AS CityStateLookupResponseItemContract;

abstract class BaseCityStateLookupResponseItem implements CityStateLookupResponseItemContract
{

    /**
     * @var string|null
     */
    protected $zip5;

    /**
     * @var string|null
     */
    protected $city;

    /**
     * @var string|null
     */
    protected $state;

    /**
     * @var BaseUSPSError
     */
    protected $uspsError;

    
    /**
     * @return null|string
     */
    public function getZip5()
    {
        return $this->zip5;
    }

    /**
     * @param null|string $zip5
     */
    public function setZip5($zip5)
    {
        $this->zip5 = $zip5;
    }

    /**
     * @return null|string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param null|string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return null|string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param null|string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return BaseUSPSError
     */
    public function getUspsError()
    {
        return $this->uspsError;
    }

    /**
     * @param BaseUSPSError $uspsError
     */
    public function setUspsError($uspsError)
    {
        $this->uspsError = $uspsError;
    }
    
}