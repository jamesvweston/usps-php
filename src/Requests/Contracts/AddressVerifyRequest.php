<?php

namespace jamesvweston\USPS\Requests\Contracts;


interface AddressVerifyRequest extends USPSRequest
{
    function getItems();
    function addItem($item);
    function setItems($items);
    function getIncludeOptionalElements();
    function setIncludeOptionalElements($includeOptionalElements);
    function getReturnCarrierRoute();
    function setReturnCarrierRoute($returnCarrierRoute);
}