<?php

namespace jamesvweston\USPS\Requests\Base;


use jamesvweston\USPS\Requests\Contracts\ZipCodeLookupRequest AS ZipCodeLookupRequestContract;

abstract class BaseZipCodeLookupRequest implements ZipCodeLookupRequestContract
{

    /**
     * @var BaseZipCodeLookupRequestItem[]
     */
    protected $items = [];

    
    /**
     * @return BaseZipCodeLookupRequestItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param   BaseZipCodeLookupRequestItem    $item
     */
    public function addItem($item)
    {
        $this->items[]  = $item;
    }

    /**
     * @param   BaseZipCodeLookupRequestItem[]  $items
     */
    public function setItems($items)
    {
        $this->items    = $items;
    }
}