@props(['iconClass' => 'w-10 h-10', 'textClass' => 'text-xl', 'subClass' => 'text-xs'])

<div {{ $attributes->merge(['class' => 'flex items-center gap-2.5']) }}>
    <svg class="{{ $iconClass }} shrink-0" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Logo FinTrack">
        <rect x="3" y="10" width="42" height="30" rx="7" fill="#2563EB"/>
        <path d="M3 20a7 7 0 0 1 7-7h28v6H3v1z" fill="#1D4ED8"/>
        <rect x="27" y="21" width="18" height="12" rx="4" fill="#22C55E"/>
        <circle cx="36" cy="27" r="2.6" fill="#FFFFFF"/>
        <circle cx="37.5" cy="7.5" r="5.5" fill="#FBBF24"/>
        <path d="M37.5 4.8v5.4M34.8 7.5h5.4" stroke="#B45309" stroke-width="1.6" stroke-linecap="round"/>
    </svg>
    <span>
        <span class="block {{ $textClass }} font-bold tracking-tight leading-none">FinTrack</span>
        <span class="block {{ $subClass }} opacity-70 mt-0.5">Keuangan Pribadi</span>
    </span>
</div>
