<?php

namespace jamesvweston\USPS\Api;


use jamesvweston\USPS\Exceptions\USPS\InvalidUSPSUserException;
use jamesvweston\USPS\Exceptions\USPS\USPSUnknownException;
use jamesvweston\USPS\Exceptions\USPS\USPSXMLSyntaxException;
use jamesvweston\USPS\Responses\USPSError;
use jamesvweston\USPS\Utilities\Data\USPSExceptionDataUtil;
use jamesvweston\Utilities\ArrayUtil AS AU;

class BaseApi
{

    /**
     * @var ApiClient
     */
    protected $apiClient;

    
    /**
     * @param ApiClient $apiClient
     */
    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient                = $apiClient;
    }

    /**
     * @param   array       $response
     * @param   bool        $throws     Throw the exception
     * @throws  USPSXMLSyntaxException|InvalidUSPSUserException|USPSUnknownException
     * @return  USPSError|null
     */
    protected function parseApiResponseError($response, $throws = true)
    {
        if (!is_null(AU::get($response['Error'])))
        {
            $uspsError                  = new USPSError($response['Error']);
            $exception                  = USPSExceptionDataUtil::parseApiResponseError($uspsError->getDescription());
            if ($throws)
                throw $exception;
        }
        
        return null;
    }

    
}