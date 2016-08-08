<?php

namespace jamesvweston\USPS\Config;


use jamesvweston\USPS\Config\Base\BaseApiConfiguration;
use jamesvweston\Utilities\ArrayUtil AS AU;

class ApiConfiguration extends BaseApiConfiguration
{

    /**
     * @param   array          $data
     */
    public function __construct($data = [])
    {
        $this->userId           = AU::get($data['userId']);
        $this->useProduction    = AU::get($data['useProduction'], true);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['userId']       = $this->userId;
        $object['useProduction']= $this->useProduction;
        
        return $object;
    }

}