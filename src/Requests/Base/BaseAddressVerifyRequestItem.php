<?php

namespace jamesvweston\USPS\Requests\Base;


use jamesvweston\USPS\Requests\Contracts\AddressVerifyRequestItem AS AddressVerifyRequestItemContract;

abstract class BaseAddressVerifyRequestItem implements AddressVerifyRequestItemContract
{
    
    /**
     * Company name
     * Max characters: 38
     * @var string|null
     */
    protected $firmName;

    /**
     * Apartment or suite number, if applicable
     * Max characters: 38
     * @var string|null
     */
    protected $address1;

    /**
     * Street address
     * Max characters: 38
     * @var string
     */
    protected $address2;

    /**
     * City name
     * City, state, or zip5 are required
     * Max characters: 15
     * @var string
     */
    protected $city;

    /**
     * State two character abbreviation
     * City, state, or zip5 are required
     * Max characters: 2
     * @var string
     */
    protected $state;

    /**
     * For Puerto Rico addresses only
     * Max characters: 28
     * @var string|null
     */
    protected $urbanization;

    /**
     * 5 digit zip code
     * Max characters: 5
     * City, state, or zip5 are required
     * @var string
     */
    protected $zip5;

    /**
     * 4 digit zip code extension
     * Max characters: 4
     * @var string|null
     */
    protected $zip4;

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

    /**
     * @return null|string
     */
    public function getUrbanization()
    {
        return $this->urbanization;
    }

    /**
     * @param null|string $urbanization
     */
    public function setUrbanization($urbanization)
    {
        $this->urbanization = $urbanization;
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
     * @return null|string
     */
    public function getZip4()
    {
        return $this->zip4;
    }

    /**
     * @param null|string $zip4
     */
    public function setZip4($zip4)
    {
        $this->zip4 = $zip4;
    }
    
}