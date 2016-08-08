<?php

namespace jamesvweston\USPS\Responses\Base;


use jamesvweston\USPS\Responses\Contracts\ZipCodeLookupResponseItem AS ZipCodeLookupResponseItemContract;

abstract class BaseZipCodeLookupResponseItem implements ZipCodeLookupResponseItemContract
{

    /**
     * @var string|null
     */
    protected $firmName;

    /**
     * @var string|null
     */
    protected $address1;
    
    /**
     * @var string
     */
    protected $address2;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $state;

    /**
     * @var string
     */
    protected $zip5;

    /**
     * @var string
     */
    protected $zip4;

    /**
     * @var BaseUSPSError
     */
    protected $uspsError;
    
    
    /**
     * @return null|string
     */
    public function getFirmName()
    {
        return $this->firmName;
    }

    /**
     * @param null|string $firmName
     */
    public function setFirmName($firmName)
    {
        $this->firmName = $firmName;
    }

    /**
     * @return null|string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * @param null|string $address1
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
    }

    /**
     * @return mixed
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param mixed $address2
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getZip5()
    {
        return $this->zip5;
    }

    /**
     * @param string $zip5
     */
    public function setZip5($zip5)
    {
        $this->zip5 = $zip5;
    }

    /**
     * @return string
     */
    public function getZip4()
    {
        return $this->zip4;
    }

    /**
     * @param string $zip4
     */
    public function setZip4($zip4)
    {
        $this->zip4 = $zip4;
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