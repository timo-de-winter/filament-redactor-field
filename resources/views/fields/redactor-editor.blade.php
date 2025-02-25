<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{ state: $wire.{{ $applyStateBindingModifiers("\$entangle('{$getStatePath()}')") }} }" wire:ignore>
        <textarea
            wire:model.live="{{ $getStatePath() }}"
            x-init="() => {
                Redactor($el, {
                    subscribe: {
                        'editor.change': html => {
                            state = html.data.html;
                        },
                        plugins: @js($getPlugins()),
                        theme: 'light',
                    }
                });
            }"
        ></textarea>
    </div>
</x-dynamic-component>

@assets
<link rel="stylesheet" href="{{ asset(config('filament-redactor-field.redactor_path') . '/redactor.min.css') }}" />
<script src="{{ asset(config('filament-redactor-field.redactor_path') . '/redactor.usm.min.js') }}" type="module"></script>

@foreach($getPlugins() as $plugin)
    <script src="{{ asset(config('filament-redactor-field.redactor_path') . '/plugins/' . $plugin . '/' . $plugin . '.js') }}"></script>
@endforeach
@endassets
