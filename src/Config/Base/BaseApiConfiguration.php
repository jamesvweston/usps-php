<?php

namespace jamesvweston\USPS\Config\Base;


use jamesvweston\USPS\Config\Contracts\ApiConfiguration AS ApiConfigurationContract;

abstract class BaseApiConfiguration implements ApiConfigurationContract
{

    /**
     * @var string
     */
    protected $userId;

    /**
     * @var bool
     */
    protected $useProduction;

    /**
     * @var string
     */
    protected $productionUrl  = 'http://production.shippingapis.com/ShippingAPI.dll';

    /**
     * @var string
     */
    protected $testUrl        = 'http://production.shippingapis.com/ShippingAPITest.dll';

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->useProduction == true ? $this->productionUrl : $this->testUrl;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return boolean
     */
    public function getUseProduction()
    {
        return $this->useProduction;
    }

    /**
     * @param boolean $useProduction
     */
    public function setUseProduction($useProduction)
    {
        $this->useProduction = $useProduction;
    }

    /**
     * @return string
     */
    public function getProductionUrl()
    {
        return $this->productionUrl;
    }

    /**
     * @param string $productionUrl
     */
    public function setProductionUrl($productionUrl)
    {
        $this->productionUrl = $productionUrl;
    }

    /**
     * @return string
     */
    public function getTestUrl()
    {
        return $this->testUrl;
    }

    /**
     * @param string $testUrl
     */
    public function setTestUrl($testUrl)
    {
        $this->testUrl = $testUrl;
    }
}