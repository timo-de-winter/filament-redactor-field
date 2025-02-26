<?php

namespace TimoDeWinter\FilamentRedactorField\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TimoDeWinter\FilamentRedactorField\FilamentRedactorField
 */
class FilamentRedactorField extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \TimoDeWinter\FilamentRedactorField\FilamentRedactorField::class;
    }
}
