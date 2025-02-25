# A Filament field for the redactor WYSIWYG editor.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/timo-de-winter/filament-redactor-field.svg?style=flat-square)](https://packagist.org/packages/timo-de-winter/filament-redactor-field)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/timo-de-winter/filament-redactor-field/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/timo-de-winter/filament-redactor-field/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/timo-de-winter/filament-redactor-field/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/timo-de-winter/filament-redactor-field/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/timo-de-winter/filament-redactor-field.svg?style=flat-square)](https://packagist.org/packages/timo-de-winter/filament-redactor-field)

A Filament field for the redactor WYSIWYG editor.

## Installation

You can install the package via composer:

```bash
composer require timo-de-winter/filament-redactor-field
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-redactor-field-config"
```

This is the contents of the published config file:

```php
return [
    'darkmode_enabled' => true,
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-redactor-field-views"
```

## Usage

```php
// todo
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Timo de Winter](https://github.com/timo-de-winter)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
