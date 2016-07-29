<?php

namespace jamesvweston\USPS\Utilities\Data;

use jamesvweston\USPS\Models\Address;

class AddressDataUtil
{

    /**
     * @return Address
     */
    public static function getSanDiegoConventionCenter()
    {
        $address                = new Address();
        $address->setAddress2('111 W Harbor Dr');
        $address->setCity('San Diego');
        $address->setState('CA');
        $address->setZip5('92101');

        return $address;
    }

    /**
     * @return Address
     */
    public static function getSavannahConventionCenter()
    {
        $address                = new Address();
        $address->setAddress2('1 International Dr');
        $address->setCity('Savannah');
        $address->setState('GA');
        $address->setZip5('31402');

        return $address;
    }
    
}