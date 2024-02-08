@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-main-color focus:ring-main-color rounded-md shadow-sm',
]) !!}>
