<?php

namespace jamesvweston\USPS\Models\Requests;


use jamesvweston\USPS\Models\BaseAddress;
use jamesvweston\USPS\Models\Contracts\XMLRequestContract;
use jamesvweston\Utilities\ArrayUtil AS AU;

class ZipCodeLookupRequest implements XMLRequestContract
{

    /**
     * The array of baseAddresses
     * @var BaseAddress[]
     */
    protected $baseAddresses;



    public function __construct($data = null)
    {
        if (is_array($data))
        {
            $this->baseAddresses        = AU::get($data['baseAddresses']);
        }
    }

    /**
     * @param   bool $includeParentNode
     * @return  string
     */
    public function toXMLRequest($includeParentNode = true)
    {
        $xml                        =   ($includeParentNode) ? '<ZipCodeLookupRequest USERID="{USER_ID}">' : '';

        foreach ($this->baseAddresses AS $address)
        {
            $xml                    .=  $address->toXMLRequest();
        }

        $xml                        .=  ($includeParentNode) ? '</ZipCodeLookupRequest>' : '';

        return $xml;
    }

    /**
     * @return BaseAddress[]
     */
    public function getBaseAddresses()
    {
        return $this->baseAddresses;
    }

    /**
     * @param BaseAddress $baseAddress
     */
    public function addBaseAddress($baseAddress)
    {
        $this->baseAddresses[] = $baseAddress;
    }

}