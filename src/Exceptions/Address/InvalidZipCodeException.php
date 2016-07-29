<?php

namespace jamesvweston\USPS\Exceptions\Address;


use jamesvweston\USPS\Exceptions\EntityValidationException;
use jamesvweston\USPS\Utilities\Data\USPSExceptionDataUtil;

class InvalidZipCodeException extends EntityValidationException
{

    
    public function __construct($reason = 'Invalid')
    {
        $statusCode                     = USPSExceptionDataUtil::getInvalidZipCodeId();

        parent::__construct($statusCode, 'Address', 'zipCode', $reason);
    }

    /**
     * @return mixed
     */
    public function jsonSerialize()
    {
        $object['statusCode']           = $this->statusCode;
        $object['message']              = $this->message;
        $object['code']                 = $this->code;
        return $object;
    }
}