<?php

namespace SantimPay\SantimPay\Lib\Core\DirectPay;

use SantimPay\SantimPay\SantimPay;
use Firebase\JWT\JWT;
use SantimPay\SantimPay\Helper\SantimPaySupport;
use SantimPay\SantimPay\Lib\SantimPayAPIResponse;
use SantimPay\SantimPay\Lib\SantimPayCheckoutRequest;
use SantimPay\SantimPay\Lib\SantimPayCheckoutResponse;
use SantimPay\SantimPay\Lib\SantimPayCheckoutSession;
use SantimPay\SantimPay\Lib\SantimPayOptions;
use SantimPay\SantimPay\Lib\Exception\SantimPayNetworkException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use League\Flysystem\ConnectionErrorException;

class SantimPayDirect
{
    // TODO: transactionStatus: string; change to enum
    // TODO: paymentType: string; change to enum

    private $merchant_id;
    private $private_key;
    private $payment_method;
    public $http_client;

    public function __construct($http_client, $merchant_id, $private_key, $payment_method)
    {
        $this->http_client = $http_client;
        $this->merchant_id = $merchant_id;
        $this->private_key = $private_key;
        $this->payment_method = $payment_method;
    }

    public function create(SantimPayCheckoutRequest $santimPayCheckoutRequest, string $phone, SantimPayOptions $option = null): SantimPayCheckoutResponse
    {
        if ($option == null) {
            $option = new SantimPayOptions(false);
        }

        try {
            $santimPayCheckoutRequest->direct = true;
            $body = $santimPayCheckoutRequest->jsonSerialize(); 
            $body['phoneNumber'] = $phone;
            $body['paymentMethod'] = $this->payment_method;
            $body['merchantId'] = $this->merchant_id;
            $body['signedToken'] = $this->generateSignedToken($santimPayCheckoutRequest->amount, $santimPayCheckoutRequest->paymentReason, $this->payment_method, $phone);
            
            $response = $this->http_client->post(SantimPay::API_VERSION . "/direct-payment", [
                RequestOptions::JSON => $body,
            ]);
            $url = str_replace('\u0026', '&', $response->getBody()->getContents());

        
            return SantimPayCheckoutResponse::fromJson($url);
        } catch (ConnectionErrorException $e) {
            throw new SantimPayNetworkException();
        } catch (ClientException $e) {
            SantimPaySupport::__handleException($e);

            throw $e;
        }
    }

    private function generateSignedToken($amount, $paymentReason, $paymentMethod, $phone)
    {
        $time = time();
        $data = array(
            'amount' => $amount,
            'paymentMethod' => $paymentMethod,
            'phoneNumber' => $phone,
            'paymentReason' => $paymentReason,
            'merchantId' => $this->merchant_id,
            'generated' => $time
        );

        $jwt = JWT::encode($data, $this->private_key, 'ES256');

        return $jwt;
    }
}

