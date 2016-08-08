<?php

namespace jamesvweston\USPS\Responses;


use jamesvweston\USPS\Responses\Base\BaseZipCodeLookupResponse;
use jamesvweston\Utilities\ArrayUtil AS AU;

class ZipCodeLookupResponse extends BaseZipCodeLookupResponse
{

    /**
     * @param   array   $data
     */
    public function __construct($data)
    {
        $data               = AU::get($data['ZipCodeLookupResponse'], []);

        $addresses          = AU::get($data['Address'], []);
        $addresses          = AU::isArrays($addresses) ? $addresses : [$addresses];
        foreach ($addresses AS $item)
        {
            $this->items[]  = new ZipCodeLookupResponseItem($item);
        }
    }

    /**
     * @return array
     */
    function jsonSerialize()
    {
        $object['items']    = [];
        foreach ($this->items AS $item)
        {
            $object['items'][]  = $item->jsonSerialize();
        }

        return $object;
    }
}