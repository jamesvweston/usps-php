<?php

namespace jamesvweston\USPS\Models\Contracts;


interface XMLRequestContract
{

    /**
     * @param   bool $includeParentNode
     * @return  string
     */
    function toXMLRequest($includeParentNode = true);
    
}