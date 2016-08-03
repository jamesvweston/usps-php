<?php

namespace jamesvweston\tests;


use jamesvweston\USPS\Models\Requests\AddressValidateRequest;
use jamesvweston\USPS\USPSClient;
use jamesvweston\USPS\Utilities\Data\AddressDataUtil;

class AddressLookUpTest extends \PHPUnit_Framework_TestCase
{

    public function testSingleLookUp()
    {
        $uspsClient             = new USPSClient('./');
        $addressApi             = $uspsClient->getAddressApi();
        
        $addressValidateRequest = new AddressValidateRequest();

        $savannah               = AddressDataUtil::getSavannahConventionCenter();
        $addressValidateRequest->addAddress($savannah);
        
        $response               = $addressApi->validateAddress($addressValidateRequest);
print_r($response->jsonSerialize());die;
        $this->assertInstanceOf('jamesvweston\USPS\Models\Responses\AddressValidateResponse', $response);
        
        foreach ($response->getAddressResponses() AS $addressResponse)
        {
            $this->assertInstanceOf('jamesvweston\USPS\Models\Responses\AddressResponse', $addressResponse);
        }
    }
    
    public function testManyLookUp()
    {
        $uspsClient             = new USPSClient('./');
        $addressApi             = $uspsClient->getAddressApi();

        $addressValidateRequest = new AddressValidateRequest();

        $savannah               = AddressDataUtil::getSavannahConventionCenter();
        $addressValidateRequest->addAddress($savannah);

        $sanDiego               = AddressDataUtil::getSanDiegoConventionCenter();
        $addressValidateRequest->addAddress($sanDiego);


        $response               = $addressApi->validateAddress($addressValidateRequest);

        $this->assertInstanceOf('jamesvweston\USPS\Models\Responses\AddressValidateResponse', $response);

        foreach ($response->getAddressResponses() AS $addressResponse)
        {
            $this->assertInstanceOf('jamesvweston\USPS\Models\Responses\AddressResponse', $addressResponse);
        }
    }
}