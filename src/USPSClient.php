<?php

namespace jamesvweston\USPS;


use Dotenv;
use jamesvweston\USPS\Api\AddressApi;
use jamesvweston\USPS\Api\ApiConfiguration;
use jamesvweston\USPS\Exceptions\InvalidConfigurationException;
use jamesvweston\USPS\Utilities\ArrayUtil;

class USPSClient
{

    /**
     * @var ApiConfiguration
     */
    protected $apiConfiguration;


    public function __construct($config)
    {
        if (is_string($config))
        {
            if (!is_dir($config))
                throw new InvalidConfigurationException('The provided directory location does not exist at ' . $config, 400);

            Dotenv::load($config);

            $data = [
                'userId'                    => getenv('USPS_USER_ID'),
                'environment'               => getenv('USPS_ENVIRONMENT'),
            ];
        } else {
            if (is_array($config)) 
            {
                $data = [
                    'userId'                => ArrayUtil::get($config['userId']),
                    'environment'           => ArrayUtil::get($config['environment']),
                ];
            } else {
                throw new \InvalidArgumentException('A configuration must be provided');
            }
        }
        
        $this->apiConfiguration             = new ApiConfiguration($data);
    }

    /**
     * @return ApiConfiguration
     */
    public function getApiConfiguration()
    {
        return $this->apiConfiguration;
    }

    /**
     * @param ApiConfiguration $apiConfiguration
     */
    public function setApiConfiguration($apiConfiguration)
    {
        $this->apiConfiguration = $apiConfiguration;
    }

    /**
     * @return AddressApi
     */
    public function getAddressApi()
    {
        return new AddressApi($this->apiConfiguration);
    }
    
}