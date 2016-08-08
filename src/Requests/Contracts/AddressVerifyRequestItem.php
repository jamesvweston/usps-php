<?php

namespace jamesvweston\USPS\Requests\Contracts;


interface AddressVerifyRequestItem extends USPSItemRequest
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
    function getUrbanization();
    function setUrbanization($urbanization);
    function getZip5();
    function setZip5($zip5);
    function getZip4();
    function setZip4($zip4);
}