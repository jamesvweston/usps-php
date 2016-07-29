<?php

namespace jamesvweston\USPS\Exceptions\Address;


use jamesvweston\USPS\Exceptions\EntityValidationException;
use jamesvweston\USPS\Utilities\Data\USPSExceptionDataUtil;

class InvalidCityException extends EntityValidationException
{

    /**
     * InvalidCityException constructor.
     * @param string $reason
     */
    public function __construct($reason = 'Invalid')
    {
        $statusCode                     = USPSExceptionDataUtil::getInvalidCityId();
        
        parent::__construct($statusCode, 'Address', 'city', $reason);
    }
    
}