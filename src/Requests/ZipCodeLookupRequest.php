<?php

namespace jamesvweston\USPS\Requests;


use jamesvweston\USPS\Requests\Base\BaseZipCodeLookupRequest;
use jamesvweston\Utilities\ArrayUtil AS AU;

class ZipCodeLookupRequest extends BaseZipCodeLookupRequest
{

    /**
     * ZipCodeLookupRequest constructor.
     * @param   array|null $data
     */
    public function __construct($data = null)
    {
        if (is_array($data))
        {
            $this->setItems(AU::get($data['items']));
        }
    }

    /**
     * @param   string      $userId
     * @return  string
     */
    public function toXMLRequest($userId)
    {
        $xml                        = '<ZipCodeLookupRequest USERID="' . $userId .'">';

        foreach ($this->items AS $item)
            $xml                    .=  $item->toXMLRequest();

        $xml                        .= '</ZipCodeLookupRequest>';
        return $xml;
    }
    
}