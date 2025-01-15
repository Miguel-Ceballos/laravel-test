@props(['submit'])

<div {{ $attributes->merge(['class' => '']) }}>
    <div class="mt-3">
        <form wire:submit="{{ $submit }}">
            <div class="py-2 {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                {{ $form }}
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end gap-2 mt-4 text-end">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
