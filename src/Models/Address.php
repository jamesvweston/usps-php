<?php

namespace jamesvweston\USPS\Models;


use jamesvweston\USPS\Models\Contracts\XMLRequestContract;
use jamesvweston\Utilities\ArrayUtil AS AU;

class Address extends BaseAddress implements \JsonSerializable, XMLRequestContract
{

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
     * Address constructor.
     * @param   array|null          $data
     */
    public function __construct($data = null)
    {
        parent::__construct($data);
        
        if (is_array($data))
        {
            $this->urbanization     = AU::get($data['urbanization'], AU::get($data['Urbanization']));
            $this->zip5             = AU::get($data['zip5'], AU::get($data['Zip5']));
            $this->zip4             = AU::get($data['zip4'], AU::get($data['Zip4']));
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object                     = parent::jsonSerialize();
        $object['urbanization']     = $this->urbanization;
        $object['zip5']             = $this->zip5;
        $object['zip4']             = $this->zip4;
        
        return $object;
    }

    /**
     * @param   bool $includeParentNode
     * @return  string
     */
    function toXMLRequest($includeParentNode = true)
    {
        $xml                        =   ($includeParentNode) ? '<Address>' : '';
        $xml                        .=  parent::toXMLRequest(false);
        $xml                        .=  is_null($this->zip5) ? '<Zip5 />' : '<Zip5>' . $this->zip5 . '</Zip5>';
        $xml                        .=  is_null($this->zip4) ? '<Zip4 />' : '<Zip4>' . $this->zip4 . '</Zip4>';
        $xml                        .=  ($includeParentNode) ? '</Address>' : '';
        
        return $xml;
    }


    /**
     * @return string
     */
    public function getFirmName()
    {
        return $this->firmName;
    }

    /**
     * @param string $firmName
     */
    public function setFirmName($firmName)
    {
        $this->firmName = $firmName;
    }

    /**
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * @param string $address1
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
    }

    /**
     * @return null|string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param null|string $address2
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