<?php

namespace jamesvweston\USPS;


use Dotenv\Dotenv;
use jamesvweston\USPS\Api\AddressApi;
use jamesvweston\USPS\Api\ApiConfiguration;
use jamesvweston\USPS\Exceptions\InvalidConfigurationException;
use jamesvweston\Utilities\ArrayUtil;

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

            $dotEnv                         = new Dotenv($config);
            $dotEnv->load();

            $data = [
                'userId'                    => getenv('USPS_USER_ID'),
                'environment'               => getenv('USPS_ENVIRONMENT'),
            ];
        } else {
            if (is_array($config)) 
            {
                $data = [
                    'userId'                => ArrayUtil::get($config['USPS_USER_ID']),
                    'environment'           => ArrayUtil::get($config['USPS_ENVIRONMENT']),
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