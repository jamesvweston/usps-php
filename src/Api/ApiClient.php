<?php

namespace jamesvweston\USPS\Api;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use jamesvweston\USPS\Config\ApiConfiguration;
use jamesvweston\USPS\Requests\Contracts\USPSRequest AS USPSRequestContract;
use jamesvweston\USPS\Utilities\XMLUtil;

class ApiClient
{

    /**
     * @var ApiConfiguration
     */
    protected $apiConfiguration;

    /**
     * @var Client
     */
    private $guzzle;

    /**
     * @param   ApiConfiguration    $apiConfiguration
     * @param   Client|null         $guzzle
     */
    public function __construct($apiConfiguration, $guzzle = null)
    {
        $this->apiConfiguration             = $apiConfiguration;
        $this->guzzle                       = !is_null($guzzle) ? $guzzle : new Client();
    }

    /**
     * @return  ApiConfiguration
     */
    public function getApiConfiguration()
    {
        return $this->apiConfiguration;
    }

    /**
     * @param   ApiConfiguration    $apiConfiguration
     */
    public function setApiConfiguration($apiConfiguration)
    {
        $this->apiConfiguration             = $apiConfiguration;
    }


    /**
     * @param   USPSRequestContract             $request
     * @param   string                          $api
     * @throws  ConnectException|RequestException
     * @return  array
     */
    public function makeHttpGetRequest($request, $api)
    {
        $xml            = $request->toXMLRequest($this->apiConfiguration->getUserId());

        $url            = $this->apiConfiguration->getUrl() . '?API=' . $api;
        
        $response       = $this->get($xml, $url);
        return $response;
    }

    /**
     * @param   string          $xml
     * @param   string          $url
     * @throws  ConnectException|RequestException
     * @return  array
     */
    public function get($xml, $url)
    {
        try
        {
            $this->guzzle                   = new Client();
            $urlPath                        = $url . '&XML=' . $xml;
            $response                       = $this->guzzle->get($urlPath);
        }
        catch (ConnectException $c)
        {
            throw $c;
        }
        catch (RequestException $ex)
        {
            throw $ex;
        } 

        $contents                       = $response->getBody()->getContents();
        $responseArray                  = XMLUtil::createArray($contents);
        return $responseArray;
    }
}