<?php

use Livewire\Livewire;
use TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin;
use TimoDeWinter\FilamentRedactorField\Fields\RedactorEditor;
use TimoDeWinter\FilamentRedactorField\Tests\Fixtures\RedactorEditorTestComponent;

afterEach(function () {
    RedactorEditorTestComponent::$configureUsing = null;
});

it('renders the alpine component inside a field wrapper', function () {
    Livewire::test(RedactorEditorTestComponent::class)
        ->assertOk()
        ->assertSee('redactorEditor(', escape: false)
        ->assertSee('x-load-js', escape: false)
        ->assertSee('redactor-plugin.js', escape: false)
        ->assertSee('data.content', escape: false)
        ->assertSee('withDarkMode: true', escape: false);
});

it('passes the configured plugins to the editor', function () {
    RedactorEditorTestComponent::$configureUsing = fn (RedactorEditor $field) => $field
        ->plugins([DefaultRedactorPlugin::Alignment, 'counter']);

    Livewire::test(RedactorEditorTestComponent::class)
        ->assertSee('alignment', escape: false)
        ->assertSee('counter', escape: false);
});

it('renders a limiter when a max length is set', function () {
    RedactorEditorTestComponent::$configureUsing = fn (RedactorEditor $field) => $field
        ->maxLength(600);

    Livewire::test(RedactorEditorTestComponent::class)
        ->assertSee('limit: 600', escape: false);
});

it('disables the limiter when no max length is set', function () {
    Livewire::test(RedactorEditorTestComponent::class)
        ->assertSee('limiter: false', escape: false);
});

it('renders an upload endpoint when one is set', function () {
    RedactorEditorTestComponent::$configureUsing = fn (RedactorEditor $field) => $field
        ->uploadEndpoint('/redactor/upload');

    // `@js()` escapes the forward slashes of the endpoint.
    Livewire::test(RedactorEditorTestComponent::class)
        ->assertSee('upload: \'\/redactor\/upload\'', escape: false);
});

it('resolves its options through closures', function () {
    $field = RedactorEditor::make('content')
        ->plugins(fn () => ['counter'])
        ->withDarkMode(fn () => false)
        ->maxLength(fn () => 120)
        ->uploadEndpoint(fn () => '/upload');

    expect($field->getPlugins())->toBe(['counter'])
        ->and($field->getWithDarkMode())->toBeFalse()
        ->and($field->getMaxLength())->toBe(120)
        ->and($field->getUploadEndpoint())->toBe('/upload');
});

it('falls back to the config for plugins and dark mode', function () {
    config()->set('filament-redactor-field.plugins', [DefaultRedactorPlugin::Emoji]);
    config()->set('filament-redactor-field.darkmode_enabled', false);

    $field = RedactorEditor::make('content');

    expect($field->getPlugins())->toBe(['emoji'])
        ->and($field->getWithDarkMode())->toBeFalse();
});
