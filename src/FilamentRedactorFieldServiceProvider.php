<?php

namespace TimoDeWinter\FilamentRedactorField;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use TimoDeWinter\FilamentRedactorField\Commands\FilamentRedactorFieldCommand;

class FilamentRedactorFieldServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-redactor-field')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_filament_redactor_field_table')
            ->hasCommand(FilamentRedactorFieldCommand::class);
    }
}
