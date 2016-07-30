<?php

namespace jamesvweston\USPS\Models\Responses;


use jamesvweston\USPS\Models\Traits\USPSErrorTrait;
use jamesvweston\Utilities\ArrayUtil AS AU;

class CityStateZipResponse implements \JsonSerializable
{

    use USPSErrorTrait;
    
    /**
     * 5 digit zip code
     * @var string
     */
    protected $zip5;

    /**
     * 4 digit zip code
     * @var string
     */
    protected $zip4;
    
    /**
     * City name
     * @var string
     */
    protected $city;

    /**
     * State two character abbreviation
     * @var string
     */
    protected $state;


    public function __construct($data = null)
    {
        if (is_array($data))
        {
            $this->zip5             = AU::get($data['zip5'], AU::get($data['Zip5']));
            $this->zip4             = AU::get($data['zip4'], AU::get($data['Zip4']));
            $this->city             = AU::get($data['city'], AU::get($data['City']));
            $this->state            = AU::get($data['state'], AU::get($data['State']));
            $this->error            = AU::get($data['error'], AU::get($data['Error']));
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['zip5']             = $this->zip5;
        $object['zip4']             = $this->zip4;
        $object['city']             = $this->city;
        $object['state']            = $this->state;
        $object['error']            = is_null($this->getError()) ? null : $this->getError()->jsonSerialize();
        
        return $object;
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