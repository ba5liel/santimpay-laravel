<?php

namespace SantimPay\SantimPay\Commands;

use Illuminate\Console\Command;

class SantimPayCommand extends Command
{
    public $signature = 'santimPay';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
