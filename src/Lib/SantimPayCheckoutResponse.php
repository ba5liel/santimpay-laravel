<?php

namespace SantimPay\SantimPay\Lib;

use JsonSerializable;

class SantimPayCheckoutResponse implements JsonSerializable
{
   
    public $payment_url;

    public function __construct(
        $payment_url
    ) {
       
        $this->payment_url = $payment_url;
    }

    public function jsonSerialize()
    {
        return [
        
            "payment_url" => $this->payment_url,
            
        ];
    }

    public static function fromJson($url)
    {
        return new SantimPayCheckoutResponse($url);
    }
}
