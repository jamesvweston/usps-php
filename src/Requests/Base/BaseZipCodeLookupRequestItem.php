<?php

namespace jamesvweston\USPS\Requests\Base;


use jamesvweston\USPS\Requests\Contracts\ZipCodeLookupRequestItem AS ZipCodeLookupRequestItemContract;

abstract class BaseZipCodeLookupRequestItem implements ZipCodeLookupRequestItemContract
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
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param string $address2
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
    
}