<?php

namespace jamesvweston\USPS\Responses\Contracts;


interface AddressVerifyResponseItem extends \JsonSerializable
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
    function getDeliveryPoint();
    function setDeliveryPoint($deliveryPoint);
    function getCarrierRoute();
    function setCarrierRoute($carrierRoute);
    function getReturnText();
    function setReturnText($returnText);
    function getUspsError();
    function setUspsError($uspsError);
}