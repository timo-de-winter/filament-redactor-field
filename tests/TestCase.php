<?php

namespace TimoDeWinter\FilamentRedactorField\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\View;
use Orchestra\Testbench\TestCase as Orchestra;
use TimoDeWinter\FilamentRedactorField\FilamentRedactorFieldServiceProvider;

class TestCase extends Orchestra
{
    /**
     * Let Testbench discover the Filament and Livewire service providers, so the test suite
     * does not have to hard-code a provider list that differs per Filament major version.
     *
     * @var bool
     */
    protected $enablesPackageDiscoveries = true;

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'TimoDeWinter\\FilamentRedactorField\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );

        View::addNamespace('filament-redactor-field-tests', __DIR__.'/Fixtures/views');
    }

    protected function getPackageProviders($app)
    {
        return [
            FilamentRedactorFieldServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
        config()->set('app.key', 'base64:'.base64_encode(random_bytes(32)));

        /*
         foreach (\Illuminate\Support\Facades\File::allFiles(__DIR__ . '/database/migrations') as $migration) {
            (include $migration->getRealPath())->up();
         }
         */
    }
}
