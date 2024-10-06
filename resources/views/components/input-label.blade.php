@props(['value'])

<label {{ $attributes->merge(['class' => 'bg-white font-normal relative text-sm text-gray-700 absolute left-2 top-3.5']) }}>
    {{ $value ?? $slot }}
</label>
