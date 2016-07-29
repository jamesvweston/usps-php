<?php

namespace jamesvweston\USPS\Exceptions\USPS;


use jamesvweston\USPS\Utilities\Data\USPSExceptionDataUtil;

class USPSConnectionException extends \Exception 
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
        $this->statusCode               = USPSExceptionDataUtil::getConnectionErrorId();
        
        if (is_null($message))
            $message                    = USPSExceptionDataUtil::getConnectionErrorMessage();
        
        parent::__construct($message, $previous);
    }

}