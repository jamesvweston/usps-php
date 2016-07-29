<?php

namespace jamesvweston\USPS\Models\Responses;


use jamesvweston\USPS\Models\Address;
use jamesvweston\USPS\Models\Traits\USPSErrorTrait;
use jamesvweston\USPS\Utilities\ArrayUtil AS AU;

class AddressResponse extends Address implements \JsonSerializable
{

    use USPSErrorTrait;
    
    public function __construct($data = null)
    {
        parent::__construct($data);

        if (is_array($data))
        {
            $this->error            = AU::get($data['error'], AU::get($data['Error']));
        }
    }

    /**
     * @return  array
     */
    public function jsonSerialize()
    {
        $object                     = parent::jsonSerialize();
        $object['error']            = is_null($this->getError()) ? null : $this->getError()->jsonSerialize();
        
        return $object;
    }

}