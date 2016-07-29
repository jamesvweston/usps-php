<?php

namespace jamesvweston\USPS\Utilities\Data;


use jamesvweston\USPS\Exceptions\Address\AddressNotFoundException;
use jamesvweston\USPS\Exceptions\Address\InvalidCityException;
use jamesvweston\USPS\Exceptions\Address\InvalidStateException;
use jamesvweston\USPS\Exceptions\Address\MultipleAddressesFoundException;
use jamesvweston\USPS\Exceptions\USPS\USPSUnknownException;
use jamesvweston\USPS\Exceptions\USPS\USPSXMLSyntaxException;
use jamesvweston\USPS\Utilities\StringUtil;

class USPSExceptionDataUtil
{

    /**
     * @param   $description
     * @return  AddressNotFoundException|InvalidCityException|InvalidStateException|MultipleAddressesFoundException|USPSUnknownException|USPSXMLSyntaxException
     */
    public static function parseApiErrorDescription($description)
    {
        if (StringUtil::hasValue('XML Syntax Error', $description)) 
            return new USPSXMLSyntaxException();
        else if (StringUtil::hasValue('Address Not Found', $description))
            return new AddressNotFoundException();
        else if (preg_match("/Multiple addresses were found/", $description))
            return new MultipleAddressesFoundException();
        else if (preg_match("/Invalid City/", $description))
            return new InvalidCityException();
        else if (preg_match("/Invalid State/", $description))
            return new InvalidStateException();
        else
            return new USPSUnknownException($description);
    }

    /**
     * @param   string      $description
     * @return  string
     */
    public static function normalizeErrorDescription($description)
    {
        if (preg_match("/XML Syntax Error/", $description))
            return self::getXMLSyntaxErrorMessage();
        else if (preg_match("/Address Not Found/", $description))
            return self::getAddressNotFoundMessage();
        else if (preg_match("/Multiple addresses were found/", $description))
            return self::getMultipleAddressesFoundMessage();
        else if (preg_match("/Invalid City/", $description))
            return self::getInvalidCityMessage();
        else if (preg_match("/Invalid State/", $description))
            return self::getInvalidStateMessage();

        //  Zip codes
        else if (preg_match("/ZIPCode must be/", $description))
            return self::getInvalidZipCodeMessage();
        else if (preg_match("/Zip Codes must be numeric/", $description))
            return self::getInvalidZipCodeMessage();
        else if (preg_match("/Invalid Zip Code/", $description))
            return self::getInvalidZipCodeMessage();
            
        else
            return $description;
    }
    
    /**
     * @return int
     */
    public static function getAddressNotFoundId()
    {
        return 1;
    }

    /**
     * @return string
     */
    public static function getAddressNotFoundMessage()
    {
        return 'Address not found';
    }

    /**
     * @return int
     */
    public static function getMultipleAddressesFoundId()
    {
        return 2;
    }

    /**
     * @return string
     */
    public static function getMultipleAddressesFoundMessage()
    {
        return 'Multiple addresses were found';
    }

    /**
     * @return int
     */
    public static function getInvalidCityId()
    {
        return 3;
    }

    /**
     * @return string
     */
    public static function getInvalidCityMessage()
    {
        return 'Invalid city';
    }

    /**
     * @return int
     */
    public static function getInvalidStateId()
    {
        return 4;
    }

    /**
     * @return string
     */
    public static function getInvalidStateMessage()
    {
        return 'Invalid state';
    }

    /**
     * @return int
     */
    public static function getInvalidZipCodeId()
    {
        return 5;
    }

    /**
     * @return string
     */
    public static function getInvalidZipCodeMessage()
    {
        return 'Invalid zip code';
    }

    /**
     * @return int
     */
    public static function getInvalidUSPSUserId()
    {
        return 98;
    }

    /**
     * @return string
     */
    public static function getInvalidUSPSUserMessage()
    {
        return 'Invalid USPS_USER_ID';
    }

    /**
     * @return int
     */
    public static function getConnectionErrorId()
    {
        return 99;
    }

    /**
     * @return string
     */
    public static function getConnectionErrorMessage()
    {
        return 'Could not connect to USPS servers';
    }
    
    /**
     * @return int
     */
    public static function getXMLSyntaxErrorId()
    {
        return 99;
    }

    /**
     * @return string
     */
    public static function getXMLSyntaxErrorMessage()
    {
        return 'XML syntax error';
    }
    
    /**
     * @return int
     */
    public static function getUnknownErrorId()
    {
        return 100;
    }
    
}