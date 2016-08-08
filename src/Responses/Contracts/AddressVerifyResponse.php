<?php

namespace jamesvweston\USPS\Responses\Contracts;


interface AddressVerifyResponse extends \JsonSerializable
{
    function getItems();
    function addItem($item);
    function setItems($items);
}