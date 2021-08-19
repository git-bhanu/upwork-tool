@props(['disabled' => false, 'options' => [], 'selected' => 'fixed-price'])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
    @foreach($options as $option)
        <option value="{{ $option['key'] }}" @if($selected === $option['key']) selected @endif>{{ $option['value'] }}</option>
    @endforeach
</select>
