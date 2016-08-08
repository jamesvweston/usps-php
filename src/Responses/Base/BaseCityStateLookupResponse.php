<?php

namespace jamesvweston\USPS\Responses\Base;


use jamesvweston\USPS\Responses\Contracts\CityStateLookupResponse AS CityStateLookupResponseContract;

abstract class BaseCityStateLookupResponse implements CityStateLookupResponseContract
{

    /**
     * @var BaseCityStateLookupResponseItem[]
     */
    protected $items = [];

    /**
     * @return BaseCityStateLookupResponseItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param BaseCityStateLookupResponseItem $item
     */
    public function addItem($item)
    {
        $this->items[] = $item;
    }

    /**
     * @param BaseCityStateLookupResponseItem[] $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }
    
    
}