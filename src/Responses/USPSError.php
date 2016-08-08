<?php

namespace jamesvweston\USPS\Responses;


use jamesvweston\USPS\Responses\Base\BaseUSPSError;
use jamesvweston\Utilities\ArrayUtil AS AU;


class USPSError extends BaseUSPSError
{

    /**
     * @param   array       $data
     */
    public function __construct($data)
    {
        $this->number                   = AU::get($data['Number']);
        $this->setDescription(AU::get($data['Description']));
        $this->source                   = AU::get($data['Source']);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['number']           = $this->number;
        $object['description']      = $this->description;
        $object['source']           = $this->source;

        return $object;
    }
    
}