<?php

namespace jamesvweston\USPS\Api;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use jamesvweston\USPS\Exceptions\USPS\InvalidUSPSUserException;
use jamesvweston\USPS\Exceptions\USPS\USPSConnectionException;
use jamesvweston\USPS\Exceptions\USPS\USPSUnknownException;
use jamesvweston\USPS\Exceptions\USPS\USPSXMLSyntaxException;
use jamesvweston\Utilities\StringUtil;
use jamesvweston\USPS\Utilities\XMLUtil;

abstract class BaseApi
{
    
    /**
     * @var ApiConfiguration
     */
    protected $apiConfiguration;

    /**
     * @var Client
     */
    private $guzzle;
    
    
    public function __construct(ApiConfiguration $apiConfiguration)
    {
        $this->apiConfiguration         = $apiConfiguration;
    }

    /**
     * @param       string      $xml
     * @param       string      $api
     * @return      array
     * @throws      USPSConnectionException
     * @throws      USPSXMLSyntaxException
     * @throws      \Exception
     */
    protected function call($xml, $api)
    {
        $xml                            = str_replace('{USER_ID}', $this->apiConfiguration->getUserId(), $xml);
        $url                            = $this->apiConfiguration->getBaseURL() . '?API=' . $api . '&XML=' . $xml;
        
        try
        {
            $this->guzzle                   = new Client();
            $response                       = $this->guzzle->get($url);
        }
        catch (RequestException $ex)
        {
            throw new USPSConnectionException();
        } catch (\Exception $ex)
        {
            throw new USPSConnectionException();
        }
        
        $contents                       = $response->getBody()->getContents();

        if (empty($contents) || is_null($contents))
            throw new USPSConnectionException();

        $responseArray                  = XMLUtil::createArray($contents);
        
        if ($this->responseHasError($responseArray))
            $this->parseResponseErrors($responseArray['Error']['Description']);
        
        return $responseArray;
    }

    /**
     * @param   string      $description
     * @throws  InvalidUSPSUserException
     * @throws  USPSUnknownException
     * @throws  USPSXMLSyntaxException
     */
    private function parseResponseErrors($description)
    {
        if (StringUtil::contains('XML Syntax Error', $description))
            throw new USPSXMLSyntaxException();
        else if (StringUtil::contains('Username exceeds maximum length', $description)
            || StringUtil::contains('Authorization failure', $description))
            throw new InvalidUSPSUserException();
        else
            throw new USPSUnknownException($description);
    }
    
    /**
     * Checks to see if the response has an error
     * @param   array       $response
     * @return  bool
     */
    protected function responseHasError($response)
    {
        return isset($response['Error']) ? true : false;
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
    
}