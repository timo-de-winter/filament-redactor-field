<?php

namespace TimoDeWinter\FilamentRedactorField\Fields;

use Closure;
use Filament\Forms\Components\Field;
use TimoDeWinter\FilamentRedactorField\Enums\DefaultRedactorPlugin;

class RedactorEditor extends Field
{
    protected string $view = 'filament-redactor-field::fields.redactor-editor';

    protected null|array|Closure $plugins = null;

    protected null|bool|Closure $withDarkMode = null;

    protected int|Closure|null $maxLength = null;

    protected string|Closure|null $uploadEndpoint = null;

    public function getPlugins(): array
    {
        $plugins = $this->evaluate($this->plugins) ?? config('filament-redactor-field.plugins');

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

    public function getWithDarkMode(): bool
    {
        return $this->evaluate($this->withDarkMode) ?? config('filament-redactor-field.darkmode_enabled');
    }

    public function withDarkMode(null|Closure|bool $enabled = true): static
    {
        $this->withDarkMode = $enabled;

        return $this;
    }

    public function maxLength(int|Closure|null $length): static
    {
        $this->maxLength = $length;

        return $this;
    }

    public function getMaxLength(): ?int
    {
        return $this->evaluate($this->maxLength);
    }

    public function uploadEndpoint(Closure | string $endpoint): static
    {
        $this->uploadEndpoint = $endpoint;

        return $this;
    }

    public function getUploadEndpoint(): ?string
    {
        return $this->evaluate($this->uploadEndpoint);
    }
}
