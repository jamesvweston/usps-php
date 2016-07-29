<?php

namespace jamesvweston\USPS\Exceptions;


class EntityValidationException extends \Exception implements \JsonSerializable
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
    public $field;

    /**
     * @var string
     */
    public $reason;


    public function __construct($statusCode, $entity, $field, $reason, $message = null, \Exception $previous = null)
    {
        $this->statusCode               = $statusCode;
        $this->entity                   = $entity;
        $this->field                    = $field;
        $this->reason                   = $reason;
        

        if (is_null($message))
            $this->message              = $this->entity . ' ' . $this->field . ': ' . $this->reason;
        else
            $this->message              = $message;


        parent::__construct($this->message, 400, $previous);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['statusCode']           = $this->statusCode;
        $object['entity']               = $this->entity;
        $object['field']                = $this->field;
        $object['reason']               = $this->reason;
        $object['message']              = $this->message;
        $object['code']                 = $this->code;

        return $object;
    }

}