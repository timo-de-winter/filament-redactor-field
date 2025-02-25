<?php

namespace TimoDeWinter\FilamentRedactorField\Fields;

use Closure;
use Filament\Forms\Components\Field;
use TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin;

class RedactorEditor extends Field
{
    protected string $view = 'filament-redactor-field::fields.redactor-editor';

    protected null|array|Closure $plugins = null;

    public function getPlugins(): array
    {
        $plugins = is_null($this->plugins)
            ? config('filament-redactor-field.plugins')
            : $this->evaluate($this->plugins);

        return collect($plugins)
            ->map(function (string|DefaultRedactorPlugin $plugin) {
                return $plugin instanceof DefaultRedactorPlugin
                    ? $plugin->value
                    : $plugin;
            })
            ->toArray();
    }

    public function plugins(array $plugins): static
    {
        $this->plugins = $plugins;

        return $this;
    }
}
