@extends('layouts.fintrack')
@section('title', 'Transaksi')
@section('content')
<div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-5">
    <div>
        <h1 class="text-2xl md:text-3xl font-bold tracking-tight">Transaksi</h1>
        <p class="text-sm text-slate-500 mt-1">Kelola pemasukan dan pengeluaran Anda</p>
    </div>
    <a href="{{ route('transactions.create') }}" class="inline-flex items-center justify-center gap-1.5 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-xl text-sm font-medium shadow-sm hover:shadow-md hover:scale-105 transition duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
        Tambah
    </a>
</div>
<form method="GET" class="bg-white p-4 md:p-5 rounded-2xl shadow-sm mb-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari keterangan..." class="border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
    <select name="type" class="border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200 bg-white">
        <option value="">Semua Tipe</option>
        <option value="pemasukan" @selected(request('type') === 'pemasukan')>Pemasukan</option>
        <option value="pengeluaran" @selected(request('type') === 'pengeluaran')>Pengeluaran</option>
    </select>
    <select name="category_id" class="border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200 bg-white">
        <option value="">Semua Kategori</option>
        @foreach ($categories as $c)
            <option value="{{ $c->id }}" @selected((string) request('category_id') === (string) $c->id)>{{ $c->name }} ({{ $c->type }})</option>
        @endforeach
    </select>
    <input type="date" name="start_date" value="{{ request('start_date') }}" class="border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
    <input type="date" name="end_date" value="{{ request('end_date') }}" class="border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
    <div class="sm:col-span-2 lg:col-span-5 flex gap-2">
        <button class="bg-slate-800 hover:bg-slate-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition duration-200">Filter</button>
        <a href="{{ route('transactions.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-sm font-medium hover:bg-slate-100 transition duration-200">Reset</a>
    </div>
</form>
<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-sm">
    <thead><tr class="text-left text-slate-500 bg-slate-50 border-b"><th class="p-3.5 font-medium">Tanggal</th><th class="font-medium">Keterangan</th><th class="font-medium">Kategori</th><th class="font-medium">Tipe</th><th class="text-right font-medium">Nominal</th><th class="text-center font-medium p-3.5">Aksi</th></tr></thead>
    <tbody>
    @forelse ($transactions as $t)
        <tr class="border-b last:border-0 hover:bg-slate-50 transition duration-200">
            <td class="p-3.5 whitespace-nowrap">{{ $t->transaction_date->format('d-m-Y') }}</td>
            <td class="pr-3">{{ $t->description }}</td>
            <td class="pr-3">{{ $t->category->name ?? '-' }}</td>
            <td class="pr-3"><span class="inline-block px-2.5 py-1 rounded-full text-xs font-medium {{ $t->type === 'pemasukan' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">{{ ucfirst($t->type) }}</span></td>
            <td class="text-right font-semibold whitespace-nowrap pr-3">{{ format_rupiah($t->amount) }}</td>
            <td class="text-center whitespace-nowrap p-3.5">
                <a href="{{ route('transactions.edit', $t) }}" title="Ubah" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-blue-600 hover:bg-blue-50 hover:scale-105 transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                </a>
                <form action="{{ route('transactions.destroy', $t) }}" method="POST" class="inline" onsubmit="return confirm('Hapus transaksi ini?')">
                    @csrf @method('DELETE')
                    <button title="Hapus" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-red-600 hover:bg-red-50 hover:scale-105 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="6" class="p-10 text-center">
            <p class="text-4xl mb-2">🧾</p>
            <p class="text-slate-500 font-medium">Tidak ada transaksi ditemukan.</p>
            <p class="text-sm text-slate-400 mt-1">Coba ubah filter atau tambah data baru.</p>
        </td></tr>
    @endforelse
    </tbody>
</table>
</div>
</div>
<div class="mt-4">{{ $transactions->links() }}</div>
@endsection
