<?php

use SantimPay\SantimPay\Lib\SantimPay;

it('can test', function () {
    expect(true)->toBeTrue();
});

it('Creates Instance', function () {
    $this->assertTrue(new SantimPay('myAPI') instanceof SantimPay);
});

it('Is Latest Version Instance', function () {
    $this->assertTrue((new SantimPay('myAPI'))->PACKAGE_VERSION == '1.1.2');
});

it('Check API key is Set', function () {
    $santimPay = new SantimPay('myAPI');
    $this->assertTrue($santimPay->apikey == "myAPI");
});
