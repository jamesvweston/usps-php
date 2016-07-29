<?php

namespace jamesvweston\USPS\Models\Traits;


use jamesvweston\USPS\Models\Errors\USPSError;

trait USPSErrorTrait
{

    use SimpleSerializable;
    
    /**
     * @var USPSError|null
     */
    protected $error = null;

    
    /**
     * @return USPSError|null
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param USPSError $uspsError
     */
    public function setError($uspsError)
    {
        $this->error = $uspsError;
        
    }
    
}