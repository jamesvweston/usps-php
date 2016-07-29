<?php

namespace jamesvweston\tests;


use jamesvweston\USPS\Models\Requests\ZipCodeLookupRequest;
use jamesvweston\USPS\USPSClient;
use jamesvweston\USPS\Utilities\Data\BaseAddressDataUtil;

class ZipCodeLookUpTest extends \PHPUnit_Framework_TestCase
{

    public function testSingleLookUp()
    {
        $uspsClient             = new USPSClient('./');
        $addressApi             = $uspsClient->getAddressApi();
        $zipCodeLookupRequest   = new ZipCodeLookupRequest();
        
        $savannah               = BaseAddressDataUtil::getSavannahConventionCenter();

        $zipCodeLookupRequest->addBaseAddress($savannah);

        $response               = $addressApi->zipCodeLookUp($zipCodeLookupRequest);
        
        $this->assertInstanceOf('jamesvweston\USPS\Models\Responses\ZipCodeLookUpResponse', $response);

        foreach ($response->getAddressResponses() AS $addressResponse)
        {
            $this->assertInstanceOf('jamesvweston\USPS\Models\Responses\CityStateZipResponse', $addressResponse);
        }
    }
    
    public function testManyLookUp()
    {
        $uspsClient             = new USPSClient('./');
        $addressApi             = $uspsClient->getAddressApi();
        $zipCodeLookupRequest   = new ZipCodeLookupRequest();

        $savannah               = BaseAddressDataUtil::getSavannahConventionCenter();
        $zipCodeLookupRequest->addBaseAddress($savannah);
        
        $sanDiego               = BaseAddressDataUtil::getSavannahConventionCenter();
        $zipCodeLookupRequest->addBaseAddress($sanDiego);

        $response               = $addressApi->zipCodeLookUp($zipCodeLookupRequest);

        $this->assertInstanceOf('jamesvweston\USPS\Models\Responses\ZipCodeLookUpResponse', $response);

        foreach ($response->getAddressResponses() AS $addressResponse)
        {
            $this->assertInstanceOf('jamesvweston\USPS\Models\Responses\CityStateZipResponse', $addressResponse);
        }
    }
    
}