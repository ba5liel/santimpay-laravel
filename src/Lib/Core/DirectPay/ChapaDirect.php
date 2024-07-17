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
use SantimPay\SantimPay\Chapa;
use SantimPay\SantimPay\Lib\ChapaRequest;
use SantimPay\SantimPay\Lib\ChapaResponse;

class ChapaDirect
{
    // TODO: transactionStatus: string; change to enum
    // TODO: paymentType: string; change to enum

    private $payment_method;
    public $http_client;

    public function __construct($http_client, $payment_method)
    {
        $this->http_client = $http_client;
        $this->payment_method = $payment_method;
    }

    public function create(ChapaRequest $chapaRequest, SantimPayOptions $option = null): ChapaResponse
    {
        if ($option == null) {
            $option = new SantimPayOptions(false);
        }

        try {
            $chapaRequest->direct = true;
            $body = $chapaRequest->jsonSerialize(); 

            $response = $this->http_client->post(Chapa::API_VERSION . "/charges?type={$this->payment_method}", [
                RequestOptions::JSON => $body,
            ]);
            $responseBody = $response->getBody()->getContents();
            $responseArray = json_decode($responseBody, true);
            return new ChapaResponse($responseArray);
        } catch (ConnectionErrorException $e) {
            throw new SantimPayNetworkException();
        } catch (ClientException $e) {
            SantimPaySupport::__handleException($e);

            throw $e;
        }
    }
}

