<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinTrack - @yield('title', 'Dashboard')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-800 antialiased">
<div class="min-h-screen flex flex-col md:flex-row" x-data="{ sidebarOpen: false }">
    <!-- Topbar mobile -->
    <div class="md:hidden sticky top-0 z-30 bg-gradient-to-r from-slate-800 to-slate-900 text-white px-4 py-3 flex items-center justify-start shadow-md">
        <button type="button" @click="sidebarOpen = !sidebarOpen" aria-label="Buka tutup menu" class="p-2 me-3 rounded-lg bg-white/10 hover:bg-white/20 transition duration-200">
            <svg x-show="!sidebarOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
            <svg x-show="sidebarOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" x-cloak><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
        <x-logo iconClass="w-8 h-8" textClass="text-lg text-white" subClass="hidden" />
    </div>

    <!-- Overlay mobile -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-30 bg-black/50 md:hidden" x-cloak x-transition.opacity duration-200></div>

    <aside class="bg-gradient-to-b from-slate-800 to-slate-900 text-white w-64 min-h-screen p-5 flex flex-col fixed inset-y-0 left-0 z-40 transform transition-transform duration-300 md:static md:z-auto md:translate-x-0 md:sticky md:top-0" :class="{ '-translate-x-full': !sidebarOpen }">
        <x-logo iconClass="w-11 h-11" textClass="text-2xl text-white" subClass="text-xs text-slate-400" class="mb-6" />
        <p class="text-xs text-slate-400 mb-4 px-1">Halo, {{ auth()->user()->name ?? 'Pengguna' }}</p>
        <nav class="flex flex-col gap-2">
            <a href="{{ route('dashboard') }}" @click="sidebarOpen = false" class="px-4 py-2.5 rounded-xl text-sm font-medium transition duration-200 {{ request()->routeIs('dashboard') ? 'bg-blue-600 shadow-md shadow-blue-900/40' : 'bg-white/10 hover:bg-white/20' }}">Dashboard</a>
            <a href="{{ route('transactions.index') }}" @click="sidebarOpen = false" class="px-4 py-2.5 rounded-xl text-sm font-medium transition duration-200 {{ request()->routeIs('transactions.*') ? 'bg-blue-600 shadow-md shadow-blue-900/40' : 'bg-white/10 hover:bg-white/20' }}">Transaksi</a>
            <a href="{{ route('categories.index') }}" @click="sidebarOpen = false" class="px-4 py-2.5 rounded-xl text-sm font-medium transition duration-200 {{ request()->routeIs('categories.*') ? 'bg-blue-600 shadow-md shadow-blue-900/40' : 'bg-white/10 hover:bg-white/20' }}">Kategori</a>
        </nav>
        <div class="flex flex-col gap-2 mt-auto pt-4 border-t border-white/10">
            <a href="{{ route('profile.edit') }}" @click="sidebarOpen = false" class="px-4 py-2.5 rounded-xl text-sm font-medium transition duration-200 {{ request()->routeIs('profile.*') ? 'bg-blue-600 shadow-md shadow-blue-900/40' : 'bg-white/10 hover:bg-white/20' }}">Profil</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2.5 rounded-xl text-sm font-medium bg-white/10 hover:bg-red-600 transition duration-200">Keluar</button>
            </form>
        </div>
    </aside>
    <main class="flex-1 p-4 md:p-8 max-w-6xl w-full mx-auto">
        @if (session('sukses'))
            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl shadow-sm mb-5 text-sm">{{ session('sukses') }}</div>
        @endif
        @if (session('gagal'))
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl shadow-sm mb-5 text-sm">{{ session('gagal') }}</div>
        @endif
        @yield('content')
    </main>
</div>
</body>
</html>
