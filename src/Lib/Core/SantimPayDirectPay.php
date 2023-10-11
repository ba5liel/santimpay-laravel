<?php

namespace SantimPay\SantimPay\Lib\Core;

use SantimPay\SantimPay\Lib\Core\DirectPay\SantimPayDirect;

class SantimPayDirectPay
{
    // TODO: transactionStatus: string; change to enum
    // TODO: paymentType: string; change to enum

    
    public $http_client;

    public $telebirr;
    public $awash;
    public $awash_wallet;

    public function __construct($http_client, $merchant_id, $private_key)
    {
        $this->http_client = $http_client;
        $this->telebirr = new SantimPayDirect($this->http_client, $merchant_id, $private_key, 'Telebirr');
    }
}
