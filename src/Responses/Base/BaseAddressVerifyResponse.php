<?php

namespace jamesvweston\USPS\Responses\Base;


use jamesvweston\USPS\Responses\Contracts\AddressVerifyResponse AS AddressVerifyResponseContract;

abstract class BaseAddressVerifyResponse implements AddressVerifyResponseContract
{

    /**
     * @var BaseAddressVerifyResponseItem[]
     */
    protected $items = [];


    /**
     * @return BaseAddressVerifyResponseItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param BaseAddressVerifyResponseItem     $item
     */
    public function addItem($item)
    {
        $this->items[]      = $item;
    }

    /**
     * @param BaseAddressVerifyResponseItem[] $items
     */
    public function setItems($items)
    {
        $this->items        = $items;
    }
}