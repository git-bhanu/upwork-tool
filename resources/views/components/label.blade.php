@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-green-500']) }}>
    {{ $value ?? $slot }}
</label>
