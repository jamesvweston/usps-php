<?php

namespace jamesvweston\USPS\Responses\Base;


use jamesvweston\USPS\Responses\Contracts\ZipCodeLookupResponse AS ZipCodeLookupResponseContract;

abstract class BaseZipCodeLookupResponse implements ZipCodeLookupResponseContract
{

    /**
     * @var BaseZipCodeLookupResponseItem[]
     */
    protected $items = [];

    /**
     * @return BaseZipCodeLookupResponseItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param BaseZipCodeLookupResponseItem[] $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }
    
}