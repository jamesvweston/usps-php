<?php

namespace jamesvweston\USPS\Requests;


use jamesvweston\USPS\Requests\Base\BaseAddressVerifyRequestItem;
use jamesvweston\USPS\Requests\Contracts\Validatable;
use jamesvweston\Utilities\ArrayUtil AS AU;

class AddressVerifyRequestItem extends BaseAddressVerifyRequestItem implements Validatable
{

    /**
     * @param   array|null  $data
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
            $this->urbanization             = AU::get($data['urbanization']);
            $this->zip5                     = AU::get($data['zip5']);
            $this->zip4                     = AU::get($data['zip4']);
        }
    }

    /**
     * @return  string
     */
    public function toXMLRequest()
    {
        $xml                        =   '<Address>';
        $xml                        .=  is_null($this->firmName) ? '<FirmName />' : '<FirmName>' . $this->firmName . '</FirmName>';
        $xml                        .=  is_null($this->address1) ? '<Address1 />' : '<Address1>' . $this->address1 . '</Address1>';
        $xml                        .=  is_null($this->address2) ? '<Address2 />' : '<Address2>' . $this->address2 . '</Address2>';
        $xml                        .=  is_null($this->city) ? '<City />' : '<City>' . $this->city . '</City>';
        $xml                        .=  is_null($this->state) ? '<State />' : '<State>' . $this->state . '</State>';
        $xml                        .=  is_null($this->urbanization) ? '<Urbanization />' : '<Urbanization>' . $this->urbanization . '</Urbanization>';
        $xml                        .=  is_null($this->zip5) ? '<Zip5 />' : '<Zip5>' . $this->zip5 . '</Zip5>';
        $xml                        .=  is_null($this->zip4) ? '<Zip4 />' : '<Zip4>' . $this->zip4 . '</Zip4>';
        $xml                        .=  '</Address>';

        return $xml;
    }
    
    public function validate()
    {
        // TODO: Implement validate() method.
    }
}