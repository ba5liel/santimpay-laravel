<?php

namespace SantimPay\SantimPay\Lib;

use JsonSerializable;

class ChapaResponse implements JsonSerializable
{
    public $event;
    public $first_name;
    public $last_name;
    public $email;
    public $mobile;
    public $currency;
    public $amount;
    public $charge;
    public $status;
    public $mode;
    public $reference;
    public $created_at;
    public $updated_at;
    public $type;
    public $tx_ref;
    public $payment_method;
    public $meta;

    public function __construct(
        $event,
        $first_name,
        $last_name,
        $email,
        $mobile,
        $currency,
        $amount,
        $charge,
        $status,
        $mode,
        $reference,
        $created_at,
        $updated_at,
        $type,
        $tx_ref,
        $payment_method,
        $meta = null
    ) {
        $this->event = $event;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->mobile = $mobile;
        $this->currency = $currency;
        $this->amount = $amount;
        $this->charge = $charge;
        $this->status = $status;
        $this->mode = $mode;
        $this->reference = $reference;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->type = $type;
        $this->tx_ref = $tx_ref;
        $this->payment_method = $payment_method;
        $this->meta = $meta;
    }

    public function jsonSerialize()
    {
        return [
            "event" => $this->event,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "email" => $this->email,
            "mobile" => $this->mobile,
            "currency" => $this->currency,
            "amount" => $this->amount,
            "charge" => $this->charge,
            "status" => $this->status,
            "mode" => $this->mode,
            "reference" => $this->reference,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "type" => $this->type,
            "tx_ref" => $this->tx_ref,
            "payment_method" => $this->payment_method,
            "meta" => $this->meta
        ];
    }

    public static function fromJson($data)
    {
        return new self(
            $data['event'],
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['mobile'],
            $data['currency'],
            $data['amount'],
            $data['charge'],
            $data['status'],
            $data['mode'],
            $data['reference'],
            $data['created_at'],
            $data['updated_at'],
            $data['type'],
            $data['tx_ref'],
            $data['payment_method'],
            $data['meta']
        );
    }
}
