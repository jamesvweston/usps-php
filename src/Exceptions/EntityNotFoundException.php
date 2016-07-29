<?php

namespace jamesvweston\USPS\Exceptions;


class EntityNotFoundException extends \Exception implements \JsonSerializable
{

    /**
     * @var int
     */
    public $statusCode;
    
    /**
     * @var string
     */
    public $entity;
    
    /**
     * @var string
     */
    public $reason;


    /**
     * EntityNotFoundException constructor.
     * @param   int                 $statusCode
     * @param   string              $entity
     * @param   string              $reason
     * @param   string|null         $message
     * @param   \Exception|null     $previous
     */
    public function __construct($statusCode, $entity, $reason = 'Not found', $message = null, \Exception $previous = null)
    {
        $this->statusCode               = $statusCode;
        $this->entity                   = $entity;
        $this->reason                   = $reason;
        
        if (is_null($message))
            $this->message              = $this->entity . ' ' . $this->reason;
        else
            $this->message              = $message;
        
        parent::__construct($this->message, 404, $previous);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['statusCode']           = $this->statusCode;
        $object['entity']               = $this->entity;
        $object['reason']               = $this->reason;
        $object['message']              = $this->message;
        $object['code']                 = $this->code;

        return $object;
    }
    
}