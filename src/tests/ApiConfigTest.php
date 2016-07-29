<?php

namespace jamesvweston\tests;


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
    
}