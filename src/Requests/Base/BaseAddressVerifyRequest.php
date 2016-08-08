<?php

namespace jamesvweston\USPS\Requests\Base;


use jamesvweston\USPS\Requests\Contracts\AddressVerifyRequest AS AddressVerifyRequestContract;

abstract class BaseAddressVerifyRequest implements AddressVerifyRequestContract
{

    /**
     * @var BaseAddressVerifyRequestItem[]
     */
    protected $items = [];

    /**
     * @var bool
     */
    protected $includeOptionalElements;

    /**
     * @var bool
     */
    protected $returnCarrierRoute;

    /**
     * @return BaseAddressVerifyRequestItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param BaseAddressVerifyRequestItem $item
     */
    public function addItem($item)
    {
        $this->items[]      = $item;
    }

    /**
     * @param BaseAddressVerifyRequestItem[] $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return boolean
     */
    public function getIncludeOptionalElements()
    {
        return $this->includeOptionalElements;
    }

    /**
     * @param boolean $includeOptionalElements
     */
    public function setIncludeOptionalElements($includeOptionalElements)
    {
        $this->includeOptionalElements = $includeOptionalElements;
    }

    /**
     * @return boolean
     */
    public function getReturnCarrierRoute()
    {
        return $this->returnCarrierRoute;
    }

    /**
     * @param boolean $returnCarrierRoute
     */
    public function setReturnCarrierRoute($returnCarrierRoute)
    {
        $this->returnCarrierRoute = $returnCarrierRoute;
    }
    
    
}