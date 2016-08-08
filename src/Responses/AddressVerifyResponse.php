<?php

namespace jamesvweston\USPS\Responses;


use jamesvweston\USPS\Responses\Base\BaseAddressVerifyResponse;
use jamesvweston\Utilities\ArrayUtil AS AU;

class AddressVerifyResponse extends BaseAddressVerifyResponse
{

    
    public function __construct($data)
    {
        $data               = AU::get($data['AddressValidateResponse']);
        $addresses          = AU::isArrays($data['Address']) ? $data['Address'] : [$data['Address']];
        foreach ($addresses AS $item)
        {
            $this->addItem(new AddressVerifyResponseItem($item));
        }
    }
    
    public function jsonSerialize()
    {
        $object['items'] = [];

        foreach ($this->items AS $item)
        {
            $object['items'][] = $item->jsonSerialize();
        }

        return $object;
    }

    
}