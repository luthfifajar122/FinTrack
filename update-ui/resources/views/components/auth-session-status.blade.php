@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-bold text-sm bg-mint border-2 border-ink rounded-lg px-3 py-2 shadow-brutal-sm']) }}>
        {{ $status }}
    </div>
@endif
