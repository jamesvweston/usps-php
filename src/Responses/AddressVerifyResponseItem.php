<?php

namespace jamesvweston\USPS\Responses;


use jamesvweston\USPS\Responses\Base\BaseAddressVerifyResponseItem;
use jamesvweston\Utilities\ArrayUtil AS AU;

class AddressVerifyResponseItem extends BaseAddressVerifyResponseItem
{

    /**
     * @param   array   $data
     */
    public function __construct($data)
    {
        $this->firmName                 = AU::get($data['FirmName']);
        $this->address1                 = AU::get($data['Address1']);
        $this->address2                 = AU::get($data['Address2']);
        $this->city                     = AU::get($data['City']);
        $this->state                    = AU::get($data['State']);
        $this->urbanization             = AU::get($data['Urbanization']);
        $this->zip5                     = AU::get($data['Zip5']);
        $this->zip4                     = AU::get($data['Zip4']);
        $this->deliveryPoint            = AU::get($data['DeliveryPoint']);
        $this->carrierRoute             = AU::get($data['CarrierRoute']);
        $this->returnText               = AU::get($data['ReturnText']);

        if (!is_null(AU::get($data['Source'])))
            $this->uspsError            = new USPSError($data);
        if (!is_null(AU::get($data['Error'])))
            $this->uspsError            = new USPSError($data['Error']);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['firmName']             = $this->firmName;
        $object['address1']             = $this->address1;
        $object['address2']             = $this->address2;
        $object['city']                 = $this->city;
        $object['state']                = $this->state;
        $object['urbanization']         = $this->urbanization;
        $object['zip5']                 = $this->zip5;
        $object['zip4']                 = $this->zip4;
        $object['deliveryPoint']        = $this->deliveryPoint;
        $object['carrierRoute']         = $this->carrierRoute;
        $object['returnText']           = $this->returnText;
        $object['uspsError']            = !is_null($this->uspsError) ? $this->uspsError->jsonSerialize() : null;
        
        return $object;
    }
}