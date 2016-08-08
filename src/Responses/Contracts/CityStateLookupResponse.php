<?php

namespace jamesvweston\USPS\Responses\Contracts;


interface CityStateLookupResponse extends \JsonSerializable
{
    function getItems();
    function addItem($item);
    function setItems($items);
}