<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>FinTrack</title>
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-ink antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-cream px-4">
            <div class="bg-mint border-2 border-ink rounded-xl shadow-brutal px-5 py-3 -rotate-1">
                <a href="/">
                    <x-logo iconClass="w-12 h-12" textClass="text-2xl text-ink" subClass="text-[11px] text-ink" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white border-2 border-ink rounded-xl shadow-brutal-lg overflow-hidden">
                {{ $slot }}
            </div>
            <p class="mt-4 text-xs font-bold uppercase tracking-widest text-ink/60">★ FinTrack • Keuangan Pribadi ★</p>
        </div>
    </body>
</html>
