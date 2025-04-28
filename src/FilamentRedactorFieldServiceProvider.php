<?php

namespace TimoDeWinter\FilamentRedactorField;

use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
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
                    ->askToStarRepoOnGitHub('timo-de-winter/filament-redactor-field');
            });
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            Js::make('redactor-plugin', __DIR__ . '/../resources/dist/filament-redactor-field.js'),
        ], package: 'timo-de-winter/filament-redactor-field');
    }
}
