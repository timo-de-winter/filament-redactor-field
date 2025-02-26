<?php

namespace TimoDeWinter\FilamentRedactorField;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentRedactorFieldServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-redactor-field')
            ->hasConfigFile()
            ->hasViews()
            ->hasAssets()
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishAssets()
                    ->askToStarRepoOnGitHub('timo-de-winter/filament-redactor-field');
            });
    }
}
