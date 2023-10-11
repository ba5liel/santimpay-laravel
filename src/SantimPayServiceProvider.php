<?php

namespace SantimPay\SantimPay;

use SantimPay\SantimPay\Commands\SantimPayCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SantimPayServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('santimPay')
            ->hasConfigFile();
        /* ->hasMigration('create_santimPay_table')
        ->hasRoute('api')
        ->hasCommand(SantimPayCommand::class); */
    }
}
