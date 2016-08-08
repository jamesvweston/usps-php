<?php

namespace jamesvweston\USPS\Utilities\Data;


use jamesvweston\USPS\Exceptions\USPS\InvalidUSPSUserException;
use jamesvweston\USPS\Exceptions\USPS\USPSUnknownException;
use jamesvweston\USPS\Exceptions\USPS\USPSXMLSyntaxException;
use jamesvweston\Utilities\StringUtil;

class USPSExceptionDataUtil
{

    /**
     * @param   $description
     * @return  USPSXMLSyntaxException|InvalidUSPSUserException|USPSUnknownException
     */
    public static function parseApiResponseError($description)
    {
        if (StringUtil::contains('XML Syntax Error', $description)) 
            return new USPSXMLSyntaxException();
        else if (StringUtil::contains('Invalid USPS USERID', $description))
            return new InvalidUSPSUserException();
        else
            return new USPSUnknownException($description);
    }

    /**
     * @param   string      $description
     * @return  string
     */
    public static function normalizeErrorDescription($description)
    {
        //  XML errors
        if (preg_match("/XML Syntax Error/", $description))
            return self::getXMLSyntaxErrorMessage();
            
            
        //  Authentication errors
        else if (preg_match("/Username exceeds maximum length/", $description))
            return self::getInvalidUSPSUserMessage();
        else if (preg_match("/Authorization failure/", $description))
            return self::getInvalidUSPSUserMessage();
            
            
        //  Address    
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
        return 'Invalid USPS USERID';
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