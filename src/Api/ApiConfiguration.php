<?php

namespace jamesvweston\USPS\Api;


use jamesvweston\USPS\Utilities\ArrayUtil;

class ApiConfiguration
{

    /**
     * @var string
     */
    protected $environment;
    
    /**
     * @var string
     */
    protected $userId;

    /**
     * @var string
     */
    protected $productionUrl  = 'http://production.shippingapis.com/ShippingAPI.dll';

    /**
     * @var string
     */
    protected $testUrl        = 'http://production.shippingapis.com/ShippingAPITest.dll';

    
    /**
     * ApiConfiguration constructor.
     * @param   array|null          $data
     */
    public function __construct($data = null)
    {
        if (is_array($data))
        {
            $this->userId           = ArrayUtil::get($data['userId']);
            $this->environment      = ArrayUtil::get($data['environment']);
        }
    }

    /**
     * @return string
     */
    public function getBaseURL()
    {
        return $this->environment == 'production' ? $this->productionUrl : $this->testUrl;
    }


    /**
     * @return string
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param string $environment
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
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
     * @return string
     */
    public function getProductionUrl()
    {
        return $this->productionUrl;
    }

    /**
     * @return string
     */
    public function getTestUrl()
    {
        return $this->testUrl;
    }

}