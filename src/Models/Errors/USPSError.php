<?php

namespace jamesvweston\USPS\Models\Errors;


use jamesvweston\USPS\Utilities\ArrayUtil AS AU;
use jamesvweston\USPS\Utilities\Data\USPSExceptionDataUtil;

class USPSError implements \JsonSerializable
{
    
    /**
     * @var string
     */
    protected $number;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $source;


    public function __construct($data = null)
    {
        $this->number                   = AU::get($data['number'], AU::get($data['Number']));
        $this->description              = AU::get($data['description'], AU::get($data['Description']));
        
        if (!is_null($this->description))
            $this->setDescription($this->description);
        
        $this->source                   = AU::get($data['source'], AU::get($data['Source']));
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['number']         = $this->number;
        $object['description']         = $this->description;
        $object['source']         = $this->source;

        return $object;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = USPSExceptionDataUtil::normalizeErrorDescription($description);
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

}