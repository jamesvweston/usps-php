<?php

namespace jamesvweston\USPS\Requests\Contracts;


interface ZipCodeLookupRequest extends USPSRequest
{
    function getItems();
    function addItem($item);
    function setItems($items);
}