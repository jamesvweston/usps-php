<?php

namespace jamesvweston\USPS\Utilities\Data;


use jamesvweston\USPS\Models\BaseAddress;

class BaseAddressDataUtil
{

    /**
     * @return BaseAddress
     */
    public static function getSanDiegoConventionCenter()
    {
        $address                = new BaseAddress();
        $address->setAddress2('111 W Harbor Dr');
        $address->setCity('San Diego');
        $address->setState('CA');

        return $address;
    }

    /**
     * @return BaseAddress
     */
    public static function getSavannahConventionCenter()
    {
        $address                = new BaseAddress();
        $address->setAddress2('1 International Dr');
        $address->setCity('Savannah');
        $address->setState('GA');

        return $address;
    }

}