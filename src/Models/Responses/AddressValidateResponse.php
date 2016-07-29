<?php

namespace jamesvweston\USPS\Models\Responses;


class AddressValidateResponse implements \JsonSerializable
{
    
    /**
     * @var AddressResponse[]
     */
    protected $addressResponses;

    
    public function __construct()
    {
        
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['addressResponses'] = [];
        
        foreach ($this->addressResponses AS $item)
        {
            $object['addressResponses'][] = $item->jsonSerialize();
        }

        return $object;
    }

    /**
     * @return AddressResponse[]
     */
    public function getAddressResponses()
    {
        return $this->addressResponses;
    }
    
    public function addAddressResponse(AddressResponse $addressResponse)
    {
        $this->addressResponses[]       = $addressResponse;
    }
    
}