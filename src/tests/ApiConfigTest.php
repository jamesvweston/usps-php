<?php

namespace jamesvweston\tests;


use jamesvweston\USPS\Models\Requests\CityStateLookupRequest;
use jamesvweston\USPS\USPSClient;

class ApiConfigTest extends \PHPUnit_Framework_TestCase
{

    public function testInvalidPath()
    {
        $this->setExpectedException('jamesvweston\USPS\Exceptions\InvalidConfigurationException');
        $uspsClient             = new USPSClient('');
    }
    
    public function testDataTypeFailures()
    {
        $this->setExpectedException('InvalidArgumentException');
        $uspsClient             = new USPSClient(234234);
    }
    
    public function testInvalidUSPSUserId()
    {
        $this->setExpectedException('jamesvweston\USPS\Exceptions\USPS\InvalidUSPSUserException');
        
        $config = [
            'USPS_USER_ID'      => 'xxxxx',
            'USPS_ENVIRONMENT'  => 'production',
        ];
        
        $uspsClient             = new USPSClient($config);

        $addressApi             = $uspsClient->getAddressApi();

        $request                = new CityStateLookupRequest();
        $request->addZipCode(91932);
        $response               = $addressApi->cityStateLookUp($request);
    }
    
}