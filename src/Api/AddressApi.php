<?php

namespace jamesvweston\USPS\Api;


use jamesvweston\USPS\Exceptions\USPS\InvalidUSPSUserException;
use jamesvweston\USPS\Exceptions\USPS\USPSUnknownException;
use jamesvweston\USPS\Exceptions\USPS\USPSXMLSyntaxException;
use jamesvweston\USPS\Requests\AddressVerifyRequest;
use jamesvweston\USPS\Requests\CityStateLookupRequest;
use jamesvweston\USPS\Requests\ZipCodeLookupRequest;
use jamesvweston\USPS\Responses\AddressVerifyResponse;
use jamesvweston\USPS\Responses\CityStateLookupResponse;
use jamesvweston\USPS\Responses\ZipCodeLookupResponse;

class AddressApi extends BaseApi
{

    /**
     * @param   CityStateLookupRequest $request
     * @throws  USPSXMLSyntaxException|InvalidUSPSUserException|USPSUnknownException
     * @return  CityStateLookupResponse
     */
    public function cityStateLookUp($request)
    {
        $response           = $this->apiClient->makeHttpGetRequest($request, 'CityStateLookup');
        $this->parseApiResponseError($response, true);
        $lookupResponse     = new CityStateLookupResponse($response);
        return $lookupResponse;
    }

    /**
     * @param   AddressVerifyRequest    $request
     * @throws  USPSXMLSyntaxException|InvalidUSPSUserException|USPSUnknownException
     * @return  AddressVerifyResponse
     */
    public function verify($request)
    {
        
        $response           = $this->apiClient->makeHttpGetRequest($request, 'Verify');
        $this->parseApiResponseError($response, true);
        $verifyResponse     = new AddressVerifyResponse($response);
        return $verifyResponse;
    }

    /**
     * @param   ZipCodeLookupRequest    $request
     * @throws  USPSXMLSyntaxException|InvalidUSPSUserException|USPSUnknownException
     * @return  ZipCodeLookupResponse
     */
    public function zipCodeLookUp($request)
    {
        $response           = $this->apiClient->makeHttpGetRequest($request, 'ZipCodeLookup');
        $this->parseApiResponseError($response, true);
        $lookupResponse     = new ZipCodeLookupResponse($response);
        return $lookupResponse;
    }
}