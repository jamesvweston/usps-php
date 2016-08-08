<?php

namespace jamesvweston\USPS\Utilities\Data;


use jamesvweston\USPS\Requests\AddressVerifyRequestItem;

class AddressDataUtil
{

    /**
     * @return AddressVerifyRequestItem
     */
    public static function getSanDiegoConventionCenter()
    {
        $address                = new AddressVerifyRequestItem();
        $address->setAddress2('111 W Harbor Dr');
        $address->setCity('San Diego');
        $address->setState('CA');
        $address->setZip5('92101');

        return $address;
    }

    /**
     * @return AddressVerifyRequestItem
     */
    public static function getSavannahConventionCenter()
    {
        $address                = new AddressVerifyRequestItem();
        $address->setAddress2('1 International Dr');
        $address->setCity('Savannah');
        $address->setState('GA');
        $address->setZip5('31402');

        return $address;
    }
    
}