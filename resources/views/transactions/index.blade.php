@extends('layouts.fintrack')
@section('title', 'Transaksi')
@section('content')
<div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-5">
    <div>
        <h1 class="page-title-brutal">Transaksi</h1>
        <p class="text-xs font-bold uppercase tracking-widest text-ink/60 mt-2">Kelola pemasukan & pengeluaran Anda</p>
    </div>
    <a href="{{ route('transactions.create') }}" class="btn-brutal-mint">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
        Tambah
    </a>
</div>
<form method="GET" class="card-brutal p-4 md:p-5 mb-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari keterangan..." class="input-brutal">
    <select name="type" class="input-brutal">
        <option value="">Semua Tipe</option>
        <option value="pemasukan" @selected(request('type') === 'pemasukan')>Pemasukan</option>
        <option value="pengeluaran" @selected(request('type') === 'pengeluaran')>Pengeluaran</option>
    </select>
    <select name="category_id" class="input-brutal">
        <option value="">Semua Kategori</option>
        @foreach ($categories as $c)
            <option value="{{ $c->id }}" @selected((string) request('category_id') === (string) $c->id)>{{ $c->name }} ({{ $c->type }})</option>
        @endforeach
    </select>
    <input type="date" name="start_date" value="{{ request('start_date') }}" class="input-brutal">
    <input type="date" name="end_date" value="{{ request('end_date') }}" class="input-brutal">
    <div class="sm:col-span-2 lg:col-span-5 flex gap-2">
        <button class="btn-brutal bg-ink text-white">Filter</button>
        <a href="{{ route('transactions.index') }}" class="btn-brutal-white">Reset</a>
    </div>
</form>
<div class="card-brutal overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-sm table-brutal">
    <thead><tr class="text-left"><th class="p-3.5 font-bold uppercase text-xs tracking-widest">Tanggal</th><th class="font-bold uppercase text-xs tracking-widest">Keterangan</th><th class="font-bold uppercase text-xs tracking-widest">Kategori</th><th class="font-bold uppercase text-xs tracking-widest">Tipe</th><th class="text-right font-bold uppercase text-xs tracking-widest">Nominal</th><th class="text-center font-bold uppercase text-xs tracking-widest p-3.5">Aksi</th></tr></thead>
    <tbody>
    @forelse ($transactions as $t)
        <tr>
            <td class="p-3.5 whitespace-nowrap font-medium">{{ $t->transaction_date->format('d-m-Y') }}</td>
            <td class="pr-3 font-medium">{{ $t->description }}</td>
            <td class="pr-3">{{ $t->category->name ?? '-' }}</td>
            <td class="pr-3"><span class="badge-brutal {{ $t->type === 'pemasukan' ? 'bg-mint' : 'bg-[#FF6B6B] text-white' }}">{{ ucfirst($t->type) }}</span></td>
            <td class="text-right font-bold whitespace-nowrap pr-3">{{ format_rupiah($t->amount) }}</td>
            <td class="text-center whitespace-nowrap p-3.5">
                <a href="{{ route('transactions.edit', $t) }}" title="Ubah" class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-white border-2 border-ink shadow-brutal-sm hover:bg-mint hover:-translate-y-0.5 hover:shadow-brutal transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                </a>
                <form action="{{ route('transactions.destroy', $t) }}" method="POST" class="inline" onsubmit="return confirm('Hapus transaksi ini?')">
                    @csrf @method('DELETE')
                    <button title="Hapus" class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-white border-2 border-ink shadow-brutal-sm hover:bg-[#FF6B6B] hover:text-white hover:-translate-y-0.5 hover:shadow-brutal transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="6" class="p-10 text-center">
            <p class="font-bold uppercase">Tidak ada transaksi ditemukan.</p>
            <p class="text-sm font-medium opacity-60 mt-1">Coba ubah filter atau tambah data baru.</p>
        </td></tr>
    @endforelse
    </tbody>
</table>
</div>
</div>
<div class="mt-4">{{ $transactions->links() }}</div>
@endsection
