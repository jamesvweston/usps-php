<?php

namespace jamesvweston\USPS\Config\Contracts;


interface ApiConfiguration extends \JsonSerializable
{
    function getUrl();
    function getUserId();
    function setUserId($userId);
    function getUseProduction();
    function setUseProduction($useProduction);
    function getProductionUrl();
    function setProductionUrl($productionUrl);
    function getTestUrl();
    function setTestUrl($testUrl);
}