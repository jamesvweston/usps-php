<?php

namespace jamesvweston\USPS\Exceptions\USPS;


use jamesvweston\USPS\Utilities\Data\USPSExceptionDataUtil;


class USPSXMLSyntaxException extends \Exception
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
        $this->statusCode               = USPSExceptionDataUtil::getXMLSyntaxErrorId();

        if (is_null($message))
            $message                    = USPSExceptionDataUtil::getXMLSyntaxErrorMessage();
        
        parent::__construct($message, $previous);
    }
    
}