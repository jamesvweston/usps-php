<?php

namespace jamesvweston\tests;


use jamesvweston\USPS\Config\ApiConfiguration;
use jamesvweston\USPS\Requests\CityStateLookupRequest;
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
        $apiConfiguration       = new ApiConfiguration();
        $apiConfiguration->setUserId('asdfasdf');
        $apiConfiguration->setUseProduction(true);
        
        $uspsClient             = new USPSClient($apiConfiguration);
        $cityStateLookup        = new CityStateLookupRequest();
        $cityStateLookup->addZipCode('31401');
        $response               = $uspsClient->addressApi->cityStateLookUp($cityStateLookup);
    }
    
}