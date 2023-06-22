@props(['value'])

<label {{ $attributes->merge(['class' => 'w-full rounded-full text-white text-center p-2']) }}>
    {{ $value ?? $slot }}
</label>
