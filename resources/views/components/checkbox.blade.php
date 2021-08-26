@props(['disabled' => false, 'label', 'id'])

<div class="flex items-center my-2">
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'mr-3']) !!} type="checkbox" id="{{ $id }}">
    <label for="{{ $id }}" class="flex items-center"><p class="text-md text-gray-700">{{ $label }}</p></label>
</div>
