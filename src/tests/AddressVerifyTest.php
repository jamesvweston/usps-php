<?php

namespace jamesvweston\tests;


use jamesvweston\USPS\Requests\AddressVerifyRequest;
use jamesvweston\USPS\USPSClient;
use jamesvweston\USPS\Utilities\Data\AddressDataUtil;

class AddressVerifyTest extends \PHPUnit_Framework_TestCase
{

    public function testSingleLookUp()
    {
        $uspsClient             = new USPSClient('./');
        
        $request                = new AddressVerifyRequest();

        $savannah               = AddressDataUtil::getSavannahConventionCenter();
        $request->addItem($savannah);
        $request->setIncludeOptionalElements(true);
        $request->setReturnCarrierRoute(true);
        $response               = $uspsClient->addressApi->verify($request);
        
        $this->assertInstanceOf('jamesvweston\USPS\Responses\AddressVerifyResponse', $response);
        
        foreach ($response->getItems() AS $addressResponse)
        {
            $this->assertInstanceOf('jamesvweston\USPS\Responses\AddressVerifyResponseItem', $addressResponse);
        }
    }
    
    public function testManyLookUp()
    {
        $uspsClient             = new USPSClient('./');
        $request                = new AddressVerifyRequest();

        $savannah               = AddressDataUtil::getSavannahConventionCenter();
        $request->addItem($savannah);

        $sanDiego               = AddressDataUtil::getSanDiegoConventionCenter();
        $request->addItem($sanDiego);


        $response               = $uspsClient->addressApi->verify($request);
        $this->assertInstanceOf('jamesvweston\USPS\Responses\AddressVerifyResponse', $response);

        foreach ($response->getItems() AS $addressResponse)
        {
            $this->assertInstanceOf('jamesvweston\USPS\Responses\AddressVerifyResponseItem', $addressResponse);
        }
    }
}