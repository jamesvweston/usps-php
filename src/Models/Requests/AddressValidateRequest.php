<?php

namespace jamesvweston\USPS\Models\Requests;


use jamesvweston\USPS\Models\Address;
use jamesvweston\USPS\Models\Contracts\XMLRequestContract;
use jamesvweston\USPS\Utilities\ArrayUtil;

class AddressValidateRequest implements XMLRequestContract
{

    /**
     * The array of addresses
     * @var Address[]
     */
    protected $addresses;

    /**
     * Flag to return Delivery Point and other optional elements in the future
     * Defaults to true
     * @var bool
     */
    protected $includeOptionalElements;

    /**
     * Flag to return Carrier Route
     * Defaults to true
     * @var bool
     */
    protected $returnCarrierRoute;


    /**
     * AddressValidateRequest constructor.
     * @param   array|null          $data
     */
    public function __construct($data = null)
    {
        $this->addresses                = ArrayUtil::get($data['addresses']);
        $this->includeOptionalElements  = ArrayUtil::get($data['includeOptionalElements'], true);
        $this->returnCarrierRoute       = ArrayUtil::get($data['returnCarrierRoute'], true);
    }

    /**
     * @param   bool $includeParentNode
     * @return string
     */
    public function toXMLRequest($includeParentNode = true)
    {
        $xml                        =   ($includeParentNode) ? '<AddressValidateRequest USERID="{USER_ID}">' : '';
        $xml                        .=  '<IncludeOptionalElements>' . $this->includeOptionalElements . '</IncludeOptionalElements>';
        $xml                        .=  '<ReturnCarrierRoute>' . $this->returnCarrierRoute . '</ReturnCarrierRoute>';
        
        foreach ($this->addresses AS $address)
        {
            $xml                    .=  $address->toXMLRequest();
        }

        $xml                        .=  ($includeParentNode) ? '</AddressValidateRequest>' : '';
        
        return $xml;
    }

    /**
     * @return Address[]
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param Address $address
     */
    public function addAddress(Address $address)
    {
        $this->addresses[] = $address;
    }

    /**
     * @return boolean
     */
    public function isIncludeOptionalElements()
    {
        return $this->includeOptionalElements;
    }

    /**
     * @param boolean $includeOptionalElements
     */
    public function setIncludeOptionalElements($includeOptionalElements)
    {
        $this->includeOptionalElements = $includeOptionalElements;
    }

    /**
     * @return boolean
     */
    public function isReturnCarrierRoute()
    {
        return $this->returnCarrierRoute;
    }

    /**
     * @param boolean $returnCarrierRoute
     */
    public function setReturnCarrierRoute($returnCarrierRoute)
    {
        $this->returnCarrierRoute = $returnCarrierRoute;
    }

}