<?php

namespace jamesvweston\USPS\Requests\Contracts;


interface USPSRequest
{
    function toXMLRequest($userId);
}