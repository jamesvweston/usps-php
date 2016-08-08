<?php

namespace jamesvweston\USPS\Responses\Contracts;


interface ZipCodeLookupResponse extends \JsonSerializable
{
    function getItems();
    function setItems($items);
}