<?php

namespace SantimPay\SantimPay\Lib\Core;

use SantimPay\SantimPay\Lib\Core\DirectPay\ChapaDirect;
use SantimPay\SantimPay\Lib\Core\DirectPay\SantimPayDirect;

class ChapaDirectPay
{
    // TODO: transactionStatus: string; change to enum
    // TODO: paymentType: string; change to enum

    
    public $http_client;

    public $telebirr;
    public $cbe;
    public $mpesa;
    public $amole;
    public $awash_birr;
    public $ebirr;


    public function __construct($http_client)
    {
        $this->http_client = $http_client;
        $this->telebirr = new ChapaDirect($this->http_client, 'telebirr');
        $this->cbe = new ChapaDirect($this->http_client, 'cbebirr');
        $this->mpesa = new ChapaDirect($this->http_client, 'mpesa');
        $this->amole = new ChapaDirect($this->http_client, 'amole');
        $this->awash_birr = new ChapaDirect($this->http_client, 'awash_birr');
        $this->ebirr = new ChapaDirect($this->http_client, 'ebirr');

    }
}
