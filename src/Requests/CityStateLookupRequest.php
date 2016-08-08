<?php

namespace jamesvweston\USPS\Requests;


use jamesvweston\USPS\Requests\Base\BaseCityStateLookupRequest;
use jamesvweston\USPS\Requests\Contracts\Validatable;
use jamesvweston\Utilities\ArrayUtil AS AU;

class CityStateLookupRequest extends BaseCityStateLookupRequest implements Validatable
{

    /**
     * @param   array|null $data
     */
    public function __construct($data = null)
    {
        if (is_array($data))
        {
            $this->zipCodes         = AU::get($data['zipCodes'], []);
        }
    }

    /**
     * @param   string  $userId
     * @return  string
     */
    public function toXMLRequest($userId)
    {
        $xml                        = '<CityStateLookupRequest USERID="' . $userId . '">';

        foreach ($this->zipCodes AS $item)
            $xml                    .= '<ZipCode><Zip5>' . trim($item) . '</Zip5></ZipCode>';
        
        $xml                        .= '</CityStateLookupRequest>';
        return $xml;
    }
    
    public function validate()
    {
        // TODO: Implement validate() method.
    }

}