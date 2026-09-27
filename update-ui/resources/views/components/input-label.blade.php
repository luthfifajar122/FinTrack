@props(['value'])

<label {{ $attributes->merge(['class' => 'label-brutal']) }}>
    {{ $value ?? $slot }}
</label>
