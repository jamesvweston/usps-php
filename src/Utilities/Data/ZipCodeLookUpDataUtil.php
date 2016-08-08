<?php

namespace jamesvweston\USPS\Utilities\Data;



use jamesvweston\USPS\Requests\ZipCodeLookupRequestItem;

class ZipCodeLookUpDataUtil
{

    /**
     * @return ZipCodeLookupRequestItem
     */
    public static function getSanDiegoConventionCenter()
    {
        $address                = new ZipCodeLookupRequestItem();
        $address->setAddress2('111 W Harbor Dr');
        $address->setCity('San Diego');
        $address->setState('CA');

        return $address;
    }

    /**
     * @return ZipCodeLookupRequestItem
     */
    public static function getSavannahConventionCenter()
    {
        $address                = new ZipCodeLookupRequestItem();
        $address->setAddress2('1 International Dr');
        $address->setCity('Savannah');
        $address->setState('GA');

        return $address;
    }
    
    
    public static function getStateFailure()
    {
        $address                = new ZipCodeLookupRequestItem();
        $address->setAddress2('1 International Dr');
        $address->setCity('Savannah');
        $address->setState('georgia');

        return $address;
    }

}