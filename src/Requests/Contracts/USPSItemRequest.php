<?php

namespace jamesvweston\USPS\Requests\Contracts;


interface USPSItemRequest
{
    function toXMLRequest();
}