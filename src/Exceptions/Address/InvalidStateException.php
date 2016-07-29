<?php

namespace jamesvweston\USPS\Exceptions\Address;


use jamesvweston\USPS\Exceptions\EntityValidationException;
use jamesvweston\USPS\Utilities\Data\USPSExceptionDataUtil;

class InvalidStateException extends EntityValidationException
{

    /**
     * @var int
     */
    public $statusCode;


    /**
     * InvalidStateException constructor.
     * @param string $reason
     */
    public function __construct($reason = 'Invalid')
    {
        $statusCode                     = USPSExceptionDataUtil::getInvalidStateId();

        parent::__construct($statusCode, 'Address', 'state', $reason);
    }
    
}