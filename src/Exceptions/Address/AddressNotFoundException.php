<?php

namespace jamesvweston\USPS\Exceptions\Address;


use jamesvweston\USPS\Exceptions\EntityNotFoundException;
use jamesvweston\USPS\Utilities\Data\USPSExceptionDataUtil;

class AddressNotFoundException extends EntityNotFoundException
{

    
    /**
     * AddressNotFoundException constructor.
     */
    public function __construct()
    {
        $statusCode                     = USPSExceptionDataUtil::getAddressNotFoundId();
        
        parent::__construct($statusCode, 'Address');
    }
    
}