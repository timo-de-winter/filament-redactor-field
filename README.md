# A Filament field for the redactor WYSIWYG editor.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/timo-de-winter/filament-redactor-field.svg?style=flat-square)](https://packagist.org/packages/timo-de-winter/filament-redactor-field)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/timo-de-winter/filament-redactor-field/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/timo-de-winter/filament-redactor-field/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/timo-de-winter/filament-redactor-field/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/timo-de-winter/filament-redactor-field/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/timo-de-winter/filament-redactor-field.svg?style=flat-square)](https://packagist.org/packages/timo-de-winter/filament-redactor-field)

A Filament field for the redactor WYSIWYG editor.

## Installation
```bash
# Install the package using composer
composer require timo-de-winter/filament-redactor-field

# Publish the assets
php artisan filament:assets
```

Since Redactor is a paid package it is not shipped with this package. You should include Redactor yourself. This package assumes that `window.Redactor` is available. All plugins you want to use should be included as well.

You can publish the config file with:
```bash
php artisan vendor:publish --tag="filament-redactor-field-config"
```

This is the contents of the published config file:
```php
return [
    'darkmode_enabled' => true,

    'plugins' => [
        \TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin::Alignment,
        \TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin::BlockBackground,
        \TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin::BlockBorder,
        \TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin::BlockColor,
        \TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin::BlockFontsize,
        \TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin::BlockSpacing,
        \TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin::Emoji,
        \TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin::FontColor,
        \TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin::FontFamily,
        \TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin::FontSize,
        \TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin::FullScreen,
        \TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin::Icons,
        \TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin::ImageResize,
        \TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin::Limiter,
        \TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin::SpecialChars,
        \TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin::TextExpander,
        \TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin::Variable,
    ],
];
```

Optionally, you can publish the views using
```bash
php artisan vendor:publish --tag="filament-redactor-field-views"
```

## Usage

```php
RedactorEditor::make('content'),

// You can also limit the characters
RedactorEditor::make('content')
    ->maxLength(600),

// You can also directly set the plugins that this specific editor should use (normally it looks at the config)
RedactorEditor::make('content')
    ->plugins(['alignment', 'counter']),
    // OR
   ->plugins(function () {
        return ['counter'];
   })
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
