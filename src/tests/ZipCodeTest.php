<?php

namespace jamesvweston\tests;


use jamesvweston\USPS\Requests\ZipCodeLookupRequest;
use jamesvweston\USPS\USPSClient;
use jamesvweston\USPS\Utilities\Data\ZipCodeLookUpDataUtil;

class ZipCodeTest extends \PHPUnit_Framework_TestCase
{

    function testSingleLookup()
    {
        $uspsClient             = new USPSClient('./');
        
        $zipCodeLookupRequest   = new ZipCodeLookupRequest();
        $zipCodeLookupRequest->addItem(ZipCodeLookUpDataUtil::getSanDiegoConventionCenter());
        
        $response               = $uspsClient->addressApi->zipCodeLookUp($zipCodeLookupRequest);
        $this->assertInstanceOf('jamesvweston\USPS\Responses\ZipCodeLookupResponse', $response);
        
        foreach ($response->getItems() AS $item)
        {
            $this->assertInstanceOf('jamesvweston\USPS\Responses\ZipCodeLookupResponseItem', $item);
        }
    }
    
    function testManyLookup()
    {
        $uspsClient             = new USPSClient('./');

        $zipCodeLookupRequest   = new ZipCodeLookupRequest();
        $zipCodeLookupRequest->addItem(ZipCodeLookUpDataUtil::getSanDiegoConventionCenter());
        $zipCodeLookupRequest->addItem(ZipCodeLookUpDataUtil::getSavannahConventionCenter());
        $response               = $uspsClient->addressApi->zipCodeLookUp($zipCodeLookupRequest);

        $this->assertInstanceOf('jamesvweston\USPS\Responses\ZipCodeLookupResponse', $response);

        foreach ($response->getItems() AS $item)
        {
            $this->assertInstanceOf('jamesvweston\USPS\Responses\ZipCodeLookupResponseItem', $item);
        }
    }
    
    function testStateFailure()
    {
        $uspsClient             = new USPSClient('./');

        $zipCodeLookupRequest   = new ZipCodeLookupRequest();
        $zipCodeLookupRequest->addItem(ZipCodeLookUpDataUtil::getStateFailure());

        $response               = $uspsClient->addressApi->zipCodeLookUp($zipCodeLookupRequest);
        $this->assertInstanceOf('jamesvweston\USPS\Responses\ZipCodeLookupResponse', $response);

        foreach ($response->getItems() AS $item)
        {
            $this->assertInstanceOf('jamesvweston\USPS\Responses\ZipCodeLookupResponseItem', $item);
            $this->assertInstanceOf('jamesvweston\USPS\Responses\USPSError', $item->getUspsError());
        }
    }
}