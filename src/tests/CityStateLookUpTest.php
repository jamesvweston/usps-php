<?php

namespace jamesvweston\tests;


use jamesvweston\USPS\Models\Requests\CityStateLookupRequest;
use jamesvweston\USPS\USPSClient;

class CityStateLookUpTest extends \PHPUnit_Framework_TestCase
{

    public function testSingleLookUp()
    {
        $uspsClient             = new USPSClient('./');
        $addressApi             = $uspsClient->getAddressApi();
        
        $request                = new CityStateLookupRequest();
        $request->addZipCode(91932);

        $response               = $addressApi->cityStateLookUp($request);

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

        $request                = new CityStateLookupRequest();
        $request->addZipCode(91932);
        $request->addZipCode(31401);
        $request->addZipCode(04210);

        $response               = $addressApi->cityStateLookUp($request);

        $this->assertInstanceOf('jamesvweston\USPS\Models\Responses\ZipCodeLookUpResponse', $response);

        foreach ($response->getAddressResponses() AS $addressResponse)
        {
            $this->assertInstanceOf('jamesvweston\USPS\Models\Responses\CityStateZipResponse', $addressResponse);
        }
    }
}