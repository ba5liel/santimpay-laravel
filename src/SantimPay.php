<?php

namespace SantimPay\SantimPay;

use SantimPay\SantimPay\Lib\Core\SantimPayCheckout;
use SantimPay\SantimPay\Lib\Core\SantimPayDirectPay;
use GuzzleHttp\Client;

class SantimPay
{
    public $http_client;
    public $token;
    public $merchant_id;
    public $private_key;

    public $DEFAULT_HOST = 'https://services.santimpay.com/api';
    public const API_VERSION = '/v1/gateway';
    public static $PACKAGE_VERSION = '1.0.0';
    public $DEFAULT_TIMEOUT = 1000 * 60 * 2;
    public $checkout;
    public $directPay;

    public function __construct($token, $merchant_id, $private_key)
    {
        $this->token = $token;
        $this->merchant_id = $merchant_id;
        $this->private_key = $private_key;

        $this->http_client = new Client([
            'base_uri' => $this->DEFAULT_HOST,
            'headers' => [
                "Authorization" => "Bearer $token",
                "Content-Type" => "application/json; charset=UTF-8",
                "Accepts" => "application/json",
            ],
        ]);
        $this->checkout = new SantimPayCheckout($this->http_client, $merchant_id, $private_key);
        $this->directPay = new SantimPayDirectPay($this->http_client, $merchant_id, $private_key);
    }
}
