<?php

namespace jamesvweston\USPS\Exceptions\USPS;


use jamesvweston\USPS\Utilities\Data\USPSExceptionDataUtil;

class USPSUnknownException extends \Exception
{

    /**
     * @var int
     */
    public $statusCode;


    /**
     * @param   string                  $message
     * @param   \Exception|null         $previous
     */
    public function __construct($message, \Exception $previous = null)
    {
        $this->statusCode               = USPSExceptionDataUtil::getUnknownErrorId();

        parent::__construct($message, $previous);
    }
    
}