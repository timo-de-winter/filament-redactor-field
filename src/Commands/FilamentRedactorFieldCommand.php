<?php

namespace TimoDeWinter\FilamentRedactorField\Commands;

use Illuminate\Console\Command;

class FilamentRedactorFieldCommand extends Command
{
    public $signature = 'filament-redactor-field';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
