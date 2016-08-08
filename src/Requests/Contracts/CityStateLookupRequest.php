<?php

namespace jamesvweston\USPS\Requests\Contracts;


interface CityStateLookupRequest extends USPSRequest
{
    function getZipCodes();
    function addZipCode($zipCode);
    function setZipCodes($zipCodes);
}