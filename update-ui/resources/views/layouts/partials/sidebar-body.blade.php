{{-- Isi sidebar FinTrack: dipakai drawer mobile & aside desktop --}}
<x-logo iconClass="w-11 h-11" textClass="text-2xl text-ink" subClass="text-[11px] text-ink" class="mb-5" />
<div class="flex items-center gap-3 px-3 py-3 bg-white border-2 border-ink rounded-xl shadow-brutal-sm mb-4">
    <span class="flex items-center justify-center w-11 h-11 rounded-lg bg-ink text-mint text-lg font-bold shrink-0 border-2 border-ink">{{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}</span>
    <span class="min-w-0">
        <span class="block font-bold uppercase text-sm truncate">{{ auth()->user()->name ?? 'Pengguna' }}</span>
        <span class="block text-xs font-medium truncate opacity-70">{{ auth()->user()->email ?? '' }}</span>
    </span>
</div>
<p class="px-2 mb-1.5 text-[11px] font-bold tracking-widest text-ink/70">★ MENU UTAMA</p>
<nav class="flex flex-col gap-2">
    <a href="{{ route('dashboard') }}" @click="sidebarOpen = false" class="sidebar-link {{ request()->routeIs('dashboard') ? 'bg-ink text-white shadow-brutal' : 'bg-white text-ink border-ink shadow-brutal-sm hover:-translate-y-0.5 hover:shadow-brutal' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
        Dashboard
    </a>
    <a href="{{ route('transactions.index') }}" @click="sidebarOpen = false" class="sidebar-link {{ request()->routeIs('transactions.*') ? 'bg-ink text-white shadow-brutal' : 'bg-white text-ink border-ink shadow-brutal-sm hover:-translate-y-0.5 hover:shadow-brutal' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6M9 8h6M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z" /></svg>
        Transaksi
    </a>
    <a href="{{ route('categories.index') }}" @click="sidebarOpen = false" class="sidebar-link {{ request()->routeIs('categories.*') ? 'bg-ink text-white shadow-brutal' : 'bg-white text-ink border-ink shadow-brutal-sm hover:-translate-y-0.5 hover:shadow-brutal' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5.586a1 1 0 01.707.293l7.414 7.414a1 1 0 010 1.414l-5.586 5.586a1 1 0 01-1.414 0L5.293 10.293A1 1 0 015 9.586V4a1 1 0 011-1z" /></svg>
        Kategori
    </a>
</nav>
<p class="px-2 mt-4 mb-1.5 text-[11px] font-bold tracking-widest text-ink/70">● AKUN</p>
<div class="flex flex-col gap-2 mt-auto pt-3 border-t-2 border-ink/20">
    <a href="{{ route('profile.edit') }}" @click="sidebarOpen = false" class="sidebar-link {{ request()->routeIs('profile.*') ? 'bg-ink text-white shadow-brutal' : 'bg-white text-ink border-ink shadow-brutal-sm hover:-translate-y-0.5 hover:shadow-brutal' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
        Profil
    </a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="sidebar-link w-full bg-white text-ink border-ink shadow-brutal-sm hover:bg-[#FF6B6B] hover:text-white hover:-translate-y-0.5 hover:shadow-brutal">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
            Keluar
        </button>
    </form>
</div>
