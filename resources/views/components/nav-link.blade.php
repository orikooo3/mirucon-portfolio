@props(['active'])

@php
    $classes =
        $active ?? false
            ? // $classesが$active(true)かfalseか
            // trueの場合
            'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-2xl font-medium leading-5 text-white-color focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : // flaseの場合
            'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-2xl font-medium leading-5 text-white-color hover:text-explain-color hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
