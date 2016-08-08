<?php

namespace jamesvweston\USPS;


use Dotenv\Dotenv;
use jamesvweston\USPS\Api\AddressApi;
use jamesvweston\USPS\Api\ApiClient;
use jamesvweston\USPS\Config\ApiConfiguration;
use jamesvweston\USPS\Config\Contracts\ApiConfiguration AS ApiConfigurationContract;
use jamesvweston\USPS\Exceptions\InvalidConfigurationException;
use jamesvweston\Utilities\ArrayUtil AS AU;

class USPSClient
{

    /**
     * @var ApiClient
     */
    public $apiClient;

    /**
     * @var AddressApi
     */
    public $addressApi;


    /**
     * @param   ApiConfigurationContract|array|string       $config
     * @throws  InvalidConfigurationException|\InvalidArgumentException
     */
    public function __construct($config)
    {
        if ($config instanceof ApiConfigurationContract)
            $data                           = $config->jsonSerialize();
        else if (is_string($config))
        {
            if (!is_dir($config))
                throw new InvalidConfigurationException('Directory does not exist at ' . $config, 400);

            $dotEnv                         = new Dotenv($config);
            $dotEnv->load();

            $data = [
                'userId'                    => getenv('USPS_USER_ID'),
                'useProduction'             => getenv('USPS_USE_PRODUCTION'),
            ];
        } else {
            if (is_array($config))
            {
                $data = [
                    'userId'                => AU::get($config['userId']),
                    'useProduction'         => AU::get($config['useProduction']),
                ];
            } else {
                throw new \InvalidArgumentException('A configuration must be provided');
            }
        }
        
        $apiConfiguration           = new ApiConfiguration($data);
        $this->setApiConfiguration($apiConfiguration);
    }
    

    /**
     * @param   ApiConfiguration    $apiConfiguration
     */
    public function setApiConfiguration($apiConfiguration)
    {
        $this->apiClient            = new ApiClient($apiConfiguration);
        $this->addressApi           = new AddressApi($this->apiClient);
    }
    
}