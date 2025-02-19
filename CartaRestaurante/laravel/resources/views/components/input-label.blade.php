@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-indigo-600']) }}>
    {{ $value ?? $slot }}
</label>
