@if (isset($normal))
    <label {{ $attributes->merge(['class' => 'block font-medium text-base text-black-color']) }}>
        {{ $normal ?? $slot }}
    </label>
@elseif (isset($max))
    <label {{ $attributes->merge(['class' => 'block font-medium text-2xl text-black-color']) }}>
        {{ $max ?? $slot }}
    </label>
@elseif (isset($min))
    <label {{ $attributes->merge(['class' => 'block font-medium text-sm text-black-color']) }}>
        {{ $min ?? $slot }}
    </label>
@endif
