@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium relative text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
