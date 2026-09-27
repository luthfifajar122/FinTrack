<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinTrack - @yield('title', 'Dashboard')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>[x-cloak]{display:none!important}</style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-cream text-ink font-sans antialiased">
<div class="min-h-screen flex flex-col md:flex-row" x-data="{ sidebarOpen: false }">
    <!-- Topbar mobile -->
    <div class="md:hidden sticky top-0 z-30 bg-mint border-b-2 border-ink px-4 py-3 flex items-center justify-between">
        <button type="button" @click="sidebarOpen = !sidebarOpen" aria-label="Buka tutup menu" class="p-2 rounded-lg bg-white border-2 border-ink shadow-brutal-sm hover:-translate-y-0.5 transition-all">
            <svg x-show="!sidebarOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
            <svg x-show="sidebarOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" x-cloak><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
        <x-logo iconClass="w-8 h-8" textClass="text-lg text-ink" subClass="hidden" />
    </div>

    <!-- Overlay: ketuk area luar untuk menutup -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" style="display: none;" x-cloak x-transition.opacity duration-200 class="fixed inset-0 z-30 bg-ink/60 md:hidden"></div>

    <!-- Drawer mobile dari kiri -->
    <aside class="bg-mint border-r-2 border-ink text-ink w-72 p-5 flex flex-col fixed inset-y-0 left-0 z-40 -translate-x-full transform transition-transform duration-300 overflow-y-auto md:hidden" :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }">
        @include('layouts.partials.sidebar-body')
    </aside>

    <!-- Sidebar desktop -->
    <aside class="hidden md:flex bg-mint border-r-2 border-ink text-ink w-64 shrink-0 h-screen p-5 flex-col sticky top-0 overflow-y-auto">
        @include('layouts.partials.sidebar-body')
    </aside>
    <main class="flex-1 p-4 md:p-8 max-w-6xl w-full mx-auto">
        @if (session('sukses'))
            <div class="bg-mint-pale border-2 border-ink shadow-brutal rounded-xl px-4 py-3 mb-5 text-sm font-bold">✅ {{ session('sukses') }}</div>
        @endif
        @if (session('gagal'))
            <div class="bg-[#FF6B6B] text-white border-2 border-ink shadow-brutal rounded-xl px-4 py-3 mb-5 text-sm font-bold">⚠️ {{ session('gagal') }}</div>
        @endif
        @yield('content')
    </main>
</div>
</body>
</html>
