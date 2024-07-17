<?php

namespace SantimPay\SantimPay\Lib;

use JsonSerializable;

class ChapaResponse implements JsonSerializable
{
    public $message;
    public $status;
    public $auth_type;
    public $requestID;
    public $meta;
    public $mode;

    public function __construct($data)
    {
        $this->message = $data['message'] ?? null;
        $this->status = $data['status'] ?? null;
        $this->auth_type = $data['data']['auth_type'] ?? null;
        $this->requestID = $data['data']['requestID'] ?? null;
        $this->meta = new ChapaMetaResponse(
            $data['data']['meta']['message'] ?? null,
            $data['data']['meta']['status'] ?? null,
            $data['data']['meta']['ref_id'] ?? null,
            $data['data']['meta']['payment_status'] ?? null
        );
        $this->mode = $data['data']['mode'] ?? null;
    }

    public function jsonSerialize()
    {
        return [
            'message' => $this->message,
            'status' => $this->status,
            'data' => [
                'auth_type' => $this->auth_type,
                'requestID' => $this->requestID,
                'meta' => $this->meta,
                'mode' => $this->mode
            ]
        ];
    }
}
