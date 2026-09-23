{{-- Isi sidebar FinTrack: dipakai drawer mobile & aside desktop --}}
<x-logo iconClass="w-11 h-11" textClass="text-2xl text-white" subClass="text-xs text-slate-400" class="mb-5" />
<div class="flex items-center gap-3 px-2 py-3 border border-white/10 rounded-2xl mb-4">
    <span class="flex items-center justify-center w-11 h-11 rounded-full bg-blue-600/20 text-blue-400 text-lg font-bold shrink-0">{{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}</span>
    <span class="min-w-0">
        <span class="block font-semibold truncate">{{ auth()->user()->name ?? 'Pengguna' }}</span>
        <span class="block text-xs text-slate-400 truncate">{{ auth()->user()->email ?? '' }}</span>
    </span>
</div>
<p class="px-2 mb-1.5 text-[11px] font-semibold tracking-widest text-slate-400">MENU UTAMA</p>
<nav class="flex flex-col gap-1">
    <a href="{{ route('dashboard') }}" @click="sidebarOpen = false" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition duration-200 {{ request()->routeIs('dashboard') ? 'bg-blue-600/15 text-blue-400' : 'text-slate-200 hover:bg-white/10' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
        Dashboard
    </a>
    <a href="{{ route('transactions.index') }}" @click="sidebarOpen = false" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition duration-200 {{ request()->routeIs('transactions.*') ? 'bg-blue-600/15 text-blue-400' : 'text-slate-200 hover:bg-white/10' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6M9 8h6M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z" /></svg>
        Transaksi
    </a>
    <a href="{{ route('categories.index') }}" @click="sidebarOpen = false" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition duration-200 {{ request()->routeIs('categories.*') ? 'bg-blue-600/15 text-blue-400' : 'text-slate-200 hover:bg-white/10' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5.586a1 1 0 01.707.293l7.414 7.414a1 1 0 010 1.414l-5.586 5.586a1 1 0 01-1.414 0L5.293 10.293A1 1 0 015 9.586V4a1 1 0 011-1z" /></svg>
        Kategori
    </a>
</nav>
<p class="px-2 mt-4 mb-1.5 text-[11px] font-semibold tracking-widest text-slate-400">AKUN</p>
<div class="flex flex-col gap-1 mt-auto pt-3 border-t border-white/10">
    <a href="{{ route('profile.edit') }}" @click="sidebarOpen = false" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition duration-200 {{ request()->routeIs('profile.*') ? 'bg-blue-600/15 text-blue-400' : 'text-slate-200 hover:bg-white/10' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
        Profil
    </a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-200 hover:bg-red-600 transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
            Keluar
        </button>
    </form>
</div>
