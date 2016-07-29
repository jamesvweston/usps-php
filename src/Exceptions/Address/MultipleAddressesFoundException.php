<?php

namespace jamesvweston\USPS\Exceptions\Address;


use jamesvweston\USPS\Exceptions\EntityNotFoundException;
use jamesvweston\USPS\Utilities\Data\USPSExceptionDataUtil;

class MultipleAddressesFoundException extends EntityNotFoundException
{

    /**
     * MultipleAddressesFoundException constructor.
     */
    public function __construct()
    {
        $statusCode                     = USPSExceptionDataUtil::getMultipleAddressesFoundId();

        parent::__construct($statusCode, 'Address', 'Multiple addresses found');
    }
    
}