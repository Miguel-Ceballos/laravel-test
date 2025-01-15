@props(['disabled' => false])

@php
    $classes = 'w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm';
    if ($disabled) {
        $classes .= ' bg-gray-100';
    }
@endphp

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $classes]) !!}>
