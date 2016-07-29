<?php

namespace jamesvweston\USPS\Api;


use jamesvweston\USPS\Models\Errors\USPSError;
use jamesvweston\USPS\Models\Requests\AddressValidateRequest;
use jamesvweston\USPS\Models\Requests\CityStateLookupRequest;
use jamesvweston\USPS\Models\Requests\ZipCodeLookupRequest;
use jamesvweston\USPS\Models\Responses\AddressResponse;
use jamesvweston\USPS\Models\Responses\AddressValidateResponse;
use jamesvweston\USPS\Models\Responses\CityStateZipResponse;
use jamesvweston\USPS\Models\Responses\ZipCodeLookUpResponse;
use jamesvweston\USPS\Utilities\ArrayUtil AS AU;

class AddressApi extends BaseApi
{

    /**
     * @var string
     */
    protected $addressVerifyApi     = 'Verify';

    /**
     * @var string
     */
    protected $zipCodeLookUpApi     = 'ZipCodeLookup';

    /**
     * @var string
     */
    protected $cityStateLookUpApi   = 'CityStateLookup';


    /**
     * @param   CityStateLookupRequest $cityStateLookupRequest
     * @return  ZipCodeLookUpResponse
     * @throws  \jamesvweston\USPS\Exceptions\USPS\USPSConnectionException
     * @throws  \jamesvweston\USPS\Exceptions\USPS\USPSXMLSyntaxException
     */
    public function cityStateLookUp(CityStateLookupRequest $cityStateLookupRequest)
    {
        $xmlRequest             = $cityStateLookupRequest->toXMLRequest();
        $response               = parent::call($xmlRequest, $this->cityStateLookUpApi);
  
        $zipCodeLookUpResponse  = new ZipCodeLookUpResponse();
        $responseZipCodes       = $response['CityStateLookupResponse']['ZipCode'];
        $responseZipCodes       = AU::isArrays($responseZipCodes) ? $responseZipCodes : [$responseZipCodes];

        foreach ($responseZipCodes AS $item)
        {
            $cityStateZipResponse = new CityStateZipResponse($item);

            if (!is_null(AU::get($item['Error'])))
            {
                $uspsError      = new USPSError($item['Error']);
                $cityStateZipResponse->setError($uspsError);
            }

            $zipCodeLookUpResponse->addCityStateZipResponse($cityStateZipResponse);
        }

        return $zipCodeLookUpResponse;
    }

    /**
     * @param AddressValidateRequest $addressValidateRequest
     * @return AddressValidateResponse
     * @throws \jamesvweston\USPS\Exceptions\USPS\USPSConnectionException
     * @throws \jamesvweston\USPS\Exceptions\USPS\USPSXMLSyntaxException
     */
    public function validateAddress(AddressValidateRequest $addressValidateRequest)
    {
        $xmlRequest             = $addressValidateRequest->toXMLRequest();
        $response               = parent::call($xmlRequest, $this->addressVerifyApi);

        $addressValidateResponse = new AddressValidateResponse();
        $responseAddresses      = $response['AddressValidateResponse']['Address'];
        $responseAddresses      = AU::isArrays($responseAddresses) ? $responseAddresses : [$responseAddresses];

        foreach ($responseAddresses AS $item)
        {
            $addressResponse    = new AddressResponse($item);

            if (!is_null(AU::get($item['Error'])))
            {
                $uspsError      = new USPSError($item['Error']);
                $addressResponse->setError($uspsError);
            }

            $addressValidateResponse->addAddressResponse($addressResponse);
        }

        return $addressValidateResponse;
    }

    /**
     * @param   ZipCodeLookupRequest $zipCodeLookupRequest
     * @return  ZipCodeLookUpResponse
     * @throws  \jamesvweston\USPS\Exceptions\USPS\USPSConnectionException
     * @throws  \jamesvweston\USPS\Exceptions\USPS\USPSXMLSyntaxException
     */
    public function zipCodeLookUp(ZipCodeLookupRequest $zipCodeLookupRequest)
    {
        $xmlRequest             = $zipCodeLookupRequest->toXMLRequest();
        $response               = parent::call($xmlRequest, $this->zipCodeLookUpApi);

        $zipCodeLookupResponse  = new ZipCodeLookUpResponse();
        $responseAddresses      = $response['ZipCodeLookupResponse']['Address'];
        $responseAddresses      = AU::isArrays($responseAddresses) ? $responseAddresses : [$responseAddresses];

        foreach ($responseAddresses AS $item)
        {
            $cityStateZipResponse    = new CityStateZipResponse($item);

            if (isset($item['Error']))
            {
                $uspsError      = new USPSError($item['Error']);
                $cityStateZipResponse->setError($uspsError);
            }

            $zipCodeLookupResponse->addCityStateZipResponse($cityStateZipResponse);
        }
        
        return $zipCodeLookupResponse;
        
    }
}