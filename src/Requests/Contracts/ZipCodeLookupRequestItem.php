<?php

namespace jamesvweston\USPS\Requests\Contracts;


interface ZipCodeLookupRequestItem extends USPSItemRequest
{
    function getFirmName();
    function setFirmName($firmName);
    function getAddress1();
    function setAddress1($address1);
    function getAddress2();
    function setAddress2($address2);
    function getCity();
    function setCity($city);
    function getState();
    function setState($state);
}