<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{ state: $wire.{{ $applyStateBindingModifiers("\$entangle('{$getStatePath()}')") }} }" wire:ignore>
        <textarea
            wire:model.live="{{ $getStatePath() }}"
            aria-label="{{ $field->getName() }}"
            x-data="redactorEditor({
                updateUsing: (newState) => {
                    state = newState;
                },
                withDarkMode: @js($getWithDarkMode),
                plugins: @js($getPlugins()),
                @if(!is_null($maxLength = $getMaxLength()))
                    limiter: {
                        limit: @js($maxLength)
                    }
                @else
                    limiter: false,
                @endif
            })"
        ></textarea>
    </div>
</x-dynamic-component>
