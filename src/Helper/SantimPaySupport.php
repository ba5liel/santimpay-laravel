<?php

namespace SantimPay\SantimPay\Helper;

use SantimPay\SantimPay\Lib\Exception\SantimPayBadRequestException;
use SantimPay\SantimPay\Lib\Exception\SantimPayException;
use SantimPay\SantimPay\Lib\Exception\SantimPayNetworkException;
use SantimPay\SantimPay\Lib\Exception\SantimPayNotFoundException;
use SantimPay\SantimPay\Lib\Exception\SantimPayUnAuthorizedException;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Carbon;

class SantimPaySupport
{
    public static function getExpireDateFromDate(Carbon $date)
    {
        return $date->toDateTimeLocalString();
    }

    public static function __handleException(ClientException $e)
    {
        $response = $e->getResponse();
        if ($response) {
            if ($response->getStatusCode() == 401) {
                throw new SantimPayUnAuthorizedException('Invalid authentication credentials', $e);
            }
            if ($response->getStatusCode() === 400) {
                $responseBodyAsString = $response->getBody()->getContents();
                $msg = "Invalid Request, check your Request body.";
                if (! empty($responseBodyAsString)) {
                    $responseJson = json_decode($responseBodyAsString, true);
                    $msg = $responseJson["msg"];
                }

                throw new SantimPayBadRequestException($msg, $e);
            }
            if ($response->getStatusCode() === 404) {
                $responseBodyAsString = $response->getBody()->getContents();
                $msg = "Invalid Request, Not found.";
                if (! empty($responseBodyAsString)) {
                    $responseJson = json_decode($responseBodyAsString, true);
                    $msg = $responseJson["msg"];
                }

                throw new SantimPayNotFoundException($msg, $e);
            }

            throw new SantimPayException($e->response->data["msg"], $e);
        } else {
            throw new SantimPayNetworkException($e);
        }
    }
}
