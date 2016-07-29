<?php

namespace jamesvweston\USPS\Exceptions\USPS;


use jamesvweston\USPS\Utilities\Data\USPSExceptionDataUtil;

class InvalidUSPSUserException extends \Exception
{

    /**
     * @var int
     */
    public $statusCode;


    /**
     * @param   null $message
     * @param   \Exception|null         $previous
     */
    public function __construct($message = null, \Exception $previous = null)
    {
        $this->statusCode               = USPSExceptionDataUtil::getInvalidUSPSUserId();

        if (is_null($message))
            $message                    = USPSExceptionDataUtil::getInvalidUSPSUserMessage();

        parent::__construct($message, $previous);
    }
    
}