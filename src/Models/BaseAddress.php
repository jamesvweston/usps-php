<?php

namespace jamesvweston\USPS\Models;

use jamesvweston\USPS\Models\Contracts\XMLRequestContract;
use jamesvweston\Utilities\ArrayUtil AS AU;

class BaseAddress implements \JsonSerializable, XMLRequestContract
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


    public function __construct($data = null)
    {
        if (is_array($data))
        {
            $this->firmName         = AU::get($data['firmName'], AU::get($data['FirmName']));
            $this->address1         = AU::get($data['address1'], AU::get($data['Address1']));
            $this->address2         = AU::get($data['address2'], AU::get($data['Address2']));
            $this->city             = AU::get($data['city'], AU::get($data['City']));
            $this->state            = AU::get($data['state'], AU::get($data['State']));
        }
    }


    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['firmName']         = $this->firmName;
        $object['address1']         = $this->address1;
        $object['address2']         = $this->address2;
        $object['city']             = $this->city;
        $object['state']            = $this->state;

        return $object;
    }

    /**
     * @param   bool $includeParentNode
     * @return  string
     */
    public function toXMLRequest($includeParentNode = true)
    {
        $xml                        =   ($includeParentNode) ? '<Address>' : '';
        $xml                        .=  is_null($this->firmName) ? '<FirmName />' : '<FirmName>' . $this->firmName . '</FirmName>';
        $xml                        .=  is_null($this->address1) ? '<Address1 />' : '<Address1>' . $this->address1 . '</Address1>';
        $xml                        .=  is_null($this->address2) ? '<Address2 />' : '<Address2>' . $this->address2 . '</Address2>';
        $xml                        .=  is_null($this->city) ? '<City />' : '<City>' . $this->city . '</City>';
        $xml                        .=  is_null($this->state) ? '<State />' : '<State>' . $this->state . '</State>';
        $xml                        .=  ($includeParentNode) ? '</Address>' : '';

        return $xml;
    }

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