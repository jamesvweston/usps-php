<?php

namespace jamesvweston\USPS\Requests;


use jamesvweston\USPS\Requests\Base\BaseZipCodeLookupRequestItem;
use jamesvweston\Utilities\ArrayUtil AS AU;

class ZipCodeLookupRequestItem extends BaseZipCodeLookupRequestItem
{

    /**
     * @param   array|null $data
     */
    public function __construct($data = null)
    {
        if (is_array($data))
        {
            $this->firmName                 = AU::get($data['firmName']);
            $this->address1                 = AU::get($data['address1']);
            $this->address2                 = AU::get($data['address2']);
            $this->city                     = AU::get($data['city']);
            $this->state                    = AU::get($data['state']);
        }
    }

    /**
     * @return string
     */
    public function toXMLRequest()
    {
        $xml                                = '<Address>';
        $xml                                .= is_null($this->firmName) ? '' : '<FirmName>' . $this->firmName . '</FirmName>';
        $xml                                .= is_null($this->address1) ? '' : '<Address1>' . $this->address1 . '</Address1>';
        $xml                                .= '<Address2>' . $this->address2 . '</Address2>';
        $xml                                .= '<City>' . $this->city . '</City>';
        $xml                                .= '<State>' . $this->state . '</State>';
        $xml                                .= '</Address>';
        return $xml;
    }
}