<?php

namespace jamesvweston\USPS\Responses\Base;


use jamesvweston\USPS\Responses\Contracts\AddressVerifyResponseItem AS AddressVerifyResponseItemContract;

abstract class BaseAddressVerifyResponseItem implements AddressVerifyResponseItemContract
{

    /**
     * @var string|null
     */
    protected $firmName;

    /**
     * @var string|null
     */
    protected $address1;

    /**
     * @var string|null
     */
    protected $address2;

    /**
     * @var string|null
     */
    protected $city;

    /**
     * @var string|null
     */
    protected $state;

    /**
     * @var string|null
     */
    protected $urbanization;

    /**
     * @var string|null
     */
    protected $zip5;

    /**
     * @var string|null
     */
    protected $zip4;

    /**
     * @var string|null
     */
    protected $deliveryPoint;

    /**
     * @var string|null
     */
    protected $carrierRoute;

    /**
     * @var string|null
     */
    protected $returnText;

    /**
     * @var BaseUSPSError
     */
    protected $uspsError;

    /**
     * @return null|string
     */
    public function getFirmName()
    {
        return $this->firmName;
    }

    /**
     * @param null|string $firmName
     */
    public function setFirmName($firmName)
    {
        $this->firmName = $firmName;
    }

    /**
     * @return null|string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * @param null|string $address1
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
    }

    /**
     * @return null|string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param null|string $address2
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
    }

    /**
     * @return null|string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param null|string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return null|string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param null|string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return null|string
     */
    public function getUrbanization()
    {
        return $this->urbanization;
    }

    /**
     * @param null|string $urbanization
     */
    public function setUrbanization($urbanization)
    {
        $this->urbanization = $urbanization;
    }

    /**
     * @return null|string
     */
    public function getZip5()
    {
        return $this->zip5;
    }

    /**
     * @param null|string $zip5
     */
    public function setZip5($zip5)
    {
        $this->zip5 = $zip5;
    }

    /**
     * @return null|string
     */
    public function getZip4()
    {
        return $this->zip4;
    }

    /**
     * @param null|string $zip4
     */
    public function setZip4($zip4)
    {
        $this->zip4 = $zip4;
    }

    /**
     * @return null|string
     */
    public function getDeliveryPoint()
    {
        return $this->deliveryPoint;
    }

    /**
     * @param null|string $deliveryPoint
     */
    public function setDeliveryPoint($deliveryPoint)
    {
        $this->deliveryPoint = $deliveryPoint;
    }

    /**
     * @return null|string
     */
    public function getCarrierRoute()
    {
        return $this->carrierRoute;
    }

    /**
     * @param null|string $carrierRoute
     */
    public function setCarrierRoute($carrierRoute)
    {
        $this->carrierRoute = $carrierRoute;
    }

    /**
     * @return null|string
     */
    public function getReturnText()
    {
        return $this->returnText;
    }

    /**
     * @param null|string $returnText
     */
    public function setReturnText($returnText)
    {
        $this->returnText = $returnText;
    }

    /**
     * @return BaseUSPSError
     */
    public function getUspsError()
    {
        return $this->uspsError;
    }

    /**
     * @param BaseUSPSError $uspsError
     */
    public function setUspsError($uspsError)
    {
        $this->uspsError = $uspsError;
    }
    
}