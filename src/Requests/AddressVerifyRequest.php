<?php

namespace jamesvweston\USPS\Requests;


use jamesvweston\USPS\Requests\Base\BaseAddressVerifyRequest;
use jamesvweston\USPS\Requests\Base\BaseAddressVerifyRequestItem;
use jamesvweston\USPS\Requests\Contracts\Validatable;
use jamesvweston\Utilities\ArrayUtil AS AU;

class AddressVerifyRequest extends BaseAddressVerifyRequest implements Validatable
{

    /**
     * @param   array   $data
     */
    public function __construct($data = [])
    {
        $items                      = AU::get($data['items'], []);
        $items                      = AU::isArrays($items) ? $items : [$items];
        foreach ($items AS $item)
        {
            if ($item instanceof BaseAddressVerifyRequestItem)
                $this->addItem($item);
            else
                $this->addItem(new AddressVerifyRequestItem($item));
                
        }
        $this->includeOptionalElements  = AU::get($data['includeOptionalElements']);
        $this->returnCarrierRoute       = AU::get($data['returnCarrierRoute']);
    }

    /**
     * @param   string  $userId
     * @return  string
     */
    public function toXMLRequest($userId)
    {
        $xml                        =  '<AddressValidateRequest USERID="' . $userId . '">';
        $xml                        .= is_null($this->includeOptionalElements) ? '' : '<IncludeOptionalElements>' . $this->includeOptionalElements . '</IncludeOptionalElements>';
        $xml                        .= is_null($this->returnCarrierRoute) ? '' : '<ReturnCarrierRoute>' . $this->returnCarrierRoute . '</ReturnCarrierRoute>';

        foreach ($this->items AS $item)
            $xml                    .= $item->toXMLRequest();

        $xml                        .= '</AddressValidateRequest>';
        return $xml;
    }
    
    public function validate()
    {
        // TODO: Implement validate() method.
    }

}