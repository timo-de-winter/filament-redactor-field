<?php

namespace TimoDeWinter\FilamentRedactorField\Tests\Fixtures;

use Closure;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use TimoDeWinter\FilamentRedactorField\Fields\RedactorEditor;

/**
 * The form is configured through `getFormSchema()` / `getFormStatePath()` rather than by
 * overriding `form()`, because the `form()` signature differs between Filament versions
 * (`Filament\Forms\Form` on v3, `Filament\Schemas\Schema` on v4 and v5).
 */
class RedactorEditorTestComponent extends Component implements HasForms
{
    use InteractsWithForms;

    /** @var array<string, mixed> */
    public array $data = [];

    /** @var Closure(RedactorEditor): RedactorEditor|null */
    public static ?Closure $configureUsing = null;

    public function mount(): void
    {
        $this->getForm('form')->fill();
    }

    public function render(): View
    {
        return view('filament-redactor-field-tests::form');
    }

    /**
     * @return array<mixed>
     */
    protected function getFormSchema(): array
    {
        $field = RedactorEditor::make('content');

        if (static::$configureUsing instanceof Closure) {
            $field = (static::$configureUsing)($field);
        }

        return [$field];
    }

    protected function getFormStatePath(): ?string
    {
        return 'data';
    }
}
