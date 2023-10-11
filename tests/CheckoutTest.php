<?php

use SantimPay\SantimPay\SantimPay;
use SantimPay\SantimPay\Helper\SantimPaySupport;
use SantimPay\SantimPay\Lib\SantimPayCheckoutResponse;
use SantimPay\SantimPay\Lib\SantimPayOptions;
use SantimPay\SantimPay\Lib\Exception\SantimPayBadRequestException;
use SantimPay\SantimPay\Lib\Exception\SantimPayUnAuthorizedException;
use Illuminate\Support\Carbon;

test('checkout Is istance of  Checkout', function () {
    $santimPay = new SantimPay('myAPI');
    $this->assertTrue($santimPay->checkout() instanceof SantimPay);
});
/*
test('Creates Checkout Session', function () {
    $santimPay = new SantimPay('HrUDdrOv3TV92cgpzpbQ3DakLJtHfYfh');
    $d = new  Carbon();
    $d->setMonth(10);
    $expired = SantimPaySupport::getExpireDateFromDate($d);
    $data = new SantimPayCheckoutRequest(
        cancel_url: 'https://api.santimPay.com',
        error_url: 'https://api.santimPay.com',
        notify_url: 'https://gateway.santimPay.net/test/callback',
        expireDate: $expired,
        nonce: floor(rand() * 10000) . toString(),
        beneficiaries: [
            SantimPayBeneficary::fromJson([
                "accountNumber" => '01320811436100',
                "bank" => 'AWINETAA',
                "amount" => 10.0,
            ]),
        ],
        paymentMethods: ["CARD"],
        success_url: 'https://gateway.santimPay.net',
        items: [
            SantimPayCheckoutItem::fromJson([
                "name" => 'Bannana',
                "price" => 10.0,
                "quantity" => 1,
            ]),
        ],
    );
    $session =  $santimPay->checkout()->create($data, new SantimPayOptions(sandbox: true));
    $this->assertTrue($session instanceof SantimPayCheckoutResponse);
    $this->assertTrue(!is_null($session->sessionId));
});

test('Check API key is Invalid', function () {
    try {
        $santimPay = new SantimPay('myAPI');
        $santimPay->checkout()->fetch('fake', new SantimPayOptions(sandbox: true));
    } catch (SantimPayUnAuthorizedException $e) {

        $this->assertTrue($e instanceof SantimPayUnAuthorizedException);
    }
});

test('Check getting Session', function () {
    $santimPay = new SantimPay('HrUDdrOv3TV92cgpzpbQ3DakLJtHfYfh');
    $session = $santimPay->checkout()->fetch('11bb7352-b228-4c75-9f0d-8a035aeac08b', new SantimPayOptions(sandbox: true));
    $this->assertTrue($session->uuid == "11bb7352-b228-4c75-9f0d-8a035aeac08b");
});

test("Check Production doesn't work with Test key", function () {
    try {
        $santimPay = new SantimPay('HrUDdrOv3TV92cgpzpbQ3DakLJtHfYfh');
        $santimPay->checkout()->fetch('11bb7352-b228-4c75-9f0d-8a035aeac08b', new SantimPayOptions(sandbox: false));
    } catch (SantimPayBadRequestException $e) {
        $this->assertTrue($e instanceof SantimPayBadRequestException);
    }
}); */
