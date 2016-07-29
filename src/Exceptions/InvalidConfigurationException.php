<?php

namespace jamesvweston\USPS\Exceptions;


class InvalidConfigurationException extends \Exception
{

    public function __construct($message, $code, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}