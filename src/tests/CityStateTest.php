<?php

namespace jamesvweston\tests;


use jamesvweston\USPS\Requests\CityStateLookupRequest;
use jamesvweston\USPS\USPSClient;

class CityStateTest extends \PHPUnit_Framework_TestCase
{

    public function testSingleLookup()
    {
        $uspsClient             = new USPSClient('./');

        $cityStateLookup        = new CityStateLookupRequest();
        $cityStateLookup->addZipCode('31401');

        $response               = $uspsClient->addressApi->cityStateLookUp($cityStateLookup);
        $this->assertInstanceOf('jamesvweston\USPS\Responses\CityStateLookupResponse', $response);

        foreach ($response->getItems() AS $item)
        {
            $this->assertInstanceOf('jamesvweston\USPS\Responses\CityStateLookupResponseItem', $item);
        }
    }

    public function testManyLookup()
    {
        $uspsClient             = new USPSClient('./');

        $cityStateLookup        = new CityStateLookupRequest();
        $cityStateLookup->addZipCode('31401');
        $cityStateLookup->addZipCode('91932');

        $response               = $uspsClient->addressApi->cityStateLookUp($cityStateLookup);
        $this->assertInstanceOf('jamesvweston\USPS\Responses\CityStateLookupResponse', $response);

        foreach ($response->getItems() AS $item)
        {
            $this->assertInstanceOf('jamesvweston\USPS\Responses\CityStateLookupResponseItem', $item);
        }
    }

    public function testUSPSError()
    {
        $uspsClient             = new USPSClient('./');

        $cityStateLookup        = new CityStateLookupRequest();
        $cityStateLookup->addZipCode('243234');
        $cityStateLookup->addZipCode('0000');

        $response               = $uspsClient->addressApi->cityStateLookUp($cityStateLookup);
        $this->assertInstanceOf('jamesvweston\USPS\Responses\CityStateLookupResponse', $response);

        foreach ($response->getItems() AS $item)
        {
            $this->assertInstanceOf('jamesvweston\USPS\Responses\CityStateLookupResponseItem', $item);
            $this->assertInstanceOf('jamesvweston\USPS\Responses\USPSError', $item->getUspsError());
        }
    }

}