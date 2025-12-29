<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div
        x-data="{ state: $wire.{{ $applyStateBindingModifiers("\$entangle('{$getStatePath()}')") }} }"
        x-load-js="[@js(\Filament\Support\Facades\FilamentAsset::getScriptSrc('redactor-plugin', package: 'timo-de-winter/filament-redactor-field'))]"
        wire:ignore
    >
        <textarea
            wire:model.live="{{ $getStatePath() }}"
            aria-label="{{ $field->getName() }}"
            x-data="redactorEditor($wire.{{ $applyStateBindingModifiers("\$entangle('{$getStatePath()}')") }}, {
                updateUsing: (newState) => {
                    state = newState;
                },
                withDarkMode: @js($getWithDarkMode),
                plugins: @js($getPlugins()),
                @if(!is_null($maxLength = $getMaxLength()))
                    limiter: {
                        limit: @js($maxLength)
                    },
                @else
                    limiter: false,
                @endif

                @if(!is_null($uploadEndpoint = $getUploadEndpoint()))
                    image: {
                        upload: @js($uploadEndpoint),
                    },
                @endif
            })"
        ></textarea>
    </div>
</x-dynamic-component>
