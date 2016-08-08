<?php

namespace jamesvweston\USPS\Responses\Contracts;


interface USPSError extends \JsonSerializable
{
    function getNumber();
    function setNumber($number);
    function getDescription();
    function setDescription($description);
    function getSource();
    function setSource($source);
}