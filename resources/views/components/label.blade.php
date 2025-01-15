@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 mb-2 dark:text-gray-50']) }}>
    {{ $value ?? $slot }}
</label>
