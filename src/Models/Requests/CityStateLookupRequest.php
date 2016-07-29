<?php

namespace jamesvweston\USPS\Models\Requests;


use jamesvweston\USPS\Models\Contracts\XMLRequestContract;
use jamesvweston\USPS\Utilities\ArrayUtil AS AU;

class CityStateLookupRequest implements XMLRequestContract
{

    /**
     * @var string[]
     */
    protected $zipCodes     = [];


    public function __construct($data = null)
    {
        if (is_array($data))
        {
            $this->zipCodes             = AU::get($data['zipCodes']);
        }
    }

    /**
     * @param   bool $includeParentNode
     * @return string
     */
    public function toXMLRequest($includeParentNode = true)
    {
        $xml                        =   ($includeParentNode) ? '<CityStateLookupRequest USERID="{USER_ID}">' : '';

        foreach ($this->zipCodes AS $item)
        {
            $xml                    .=  '<ZipCode><Zip5>' . trim($item) . '</Zip5></ZipCode>';
        }

        $xml                        .=  ($includeParentNode) ? '</CityStateLookupRequest>' : '';

        return $xml;
    }

    /**
     * @return string[]
     */
    public function getZipCodes()
    {
        return $this->zipCodes;
    }

    /**
     * @param   $zipCode
     */
    public function addZipCode($zipCode)
    {
        $this->zipCodes[]       = $zipCode;
    }

}