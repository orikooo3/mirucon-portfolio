@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-black-color']) }}>
    {{ $value ?? $slot }}
</label>
