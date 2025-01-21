@props(['disabled' => false, 'action' => ''])

@php
    $classes = 'w-full disabled:bg-gray-100 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm';
@endphp

{{--<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $classes]) !!}>--}}
<input :disabled="{{$disabled ?? true}} "{!! $attributes->merge(['class' => $classes]) !!}>
