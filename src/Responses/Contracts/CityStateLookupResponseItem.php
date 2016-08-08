<?php

namespace jamesvweston\USPS\Responses\Contracts;


interface CityStateLookupResponseItem extends \JsonSerializable
{
    function getZip5();
    function setZip5($zip5);
    function getCity();
    function setCity($city);
    function getState();
    function setState($state);
    function getUspsError();
    function setUspsError($uspsError);
}