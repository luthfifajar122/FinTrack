@extends('layouts.fintrack')
@section('title', 'Dashboard')
@section('content')
<div class="mb-6">
    <h1 class="page-title-brutal">Dashboard</h1>
    <p class="mt-2 text-sm font-bold uppercase tracking-widest text-ink/60">Ringkasan keuangan pribadi Anda</p>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="card-brutal p-5 bg-[#FDE047] hover:-translate-y-1 hover:shadow-brutal-lg transition-all">
        <p class="text-xs font-bold uppercase tracking-widest mb-1">Total Saldo</p>
        <p class="text-xl font-bold">{{ format_rupiah($saldo) }}</p>
    </div>
    <div class="card-brutal p-5 bg-mint hover:-translate-y-1 hover:shadow-brutal-lg transition-all">
        <p class="text-xs font-bold uppercase tracking-widest mb-1">Total Pemasukan</p>
        <p class="text-xl font-bold">{{ format_rupiah($totalPemasukan) }}</p>
    </div>
    <div class="card-brutal p-5 bg-[#FECACA] hover:-translate-y-1 hover:shadow-brutal-lg transition-all">
        <p class="text-xs font-bold uppercase tracking-widest mb-1">Total Pengeluaran</p>
        <p class="text-xl font-bold">{{ format_rupiah($totalPengeluaran) }}</p>
    </div>
    <div class="card-brutal p-5 bg-[#DDD6FE] hover:-translate-y-1 hover:shadow-brutal-lg transition-all">
        <p class="text-xs font-bold uppercase tracking-widest mb-1">Jumlah Transaksi</p>
        <p class="text-xl font-bold">{{ $jumlahTransaksi }}</p>
    </div>
</div>
<div class="card-brutal p-5 md:p-6">
    <div class="flex items-center justify-between mb-4 pb-3 border-b-2 border-ink">
        <h2 class="font-bold text-lg uppercase tracking-tight">5 Transaksi Terbaru</h2>
        <a href="{{ route('transactions.index') }}" class="text-sm font-bold uppercase hover:bg-mint px-2 py-1 border-2 border-transparent hover:border-ink hover:shadow-brutal-sm rounded-md transition-all">Lihat semua</a>
    </div>
    <div class="overflow-x-auto -mx-5 md:mx-0 px-5 md:px-0">
    <table class="w-full text-sm table-brutal">
        <thead><tr class="text-left"><th class="py-2.5 px-3 font-bold uppercase text-xs tracking-widest">Tanggal</th><th class="px-3 font-bold uppercase text-xs tracking-widest">Keterangan</th><th class="px-3 font-bold uppercase text-xs tracking-widest">Kategori</th><th class="px-3 font-bold uppercase text-xs tracking-widest">Tipe</th><th class="text-right px-3 font-bold uppercase text-xs tracking-widest">Nominal</th></tr></thead>
        <tbody>
        @forelse ($transaksiTerbaru as $t)
            <tr>
                <td class="py-3 px-3 whitespace-nowrap font-medium">{{ $t->transaction_date->format('d-m-Y') }}</td>
                <td class="px-3 font-medium">{{ $t->description }}</td>
                <td class="px-3">{{ $t->category->name ?? '-' }}</td>
                <td class="px-3"><span class="badge-brutal {{ $t->type === 'pemasukan' ? 'bg-mint' : 'bg-[#FF6B6B] text-white' }}">{{ ucfirst($t->type) }}</span></td>
                <td class="text-right font-bold whitespace-nowrap px-3">{{ format_rupiah($t->amount) }}</td>
            </tr>
        @empty
            <tr><td colspan="5" class="py-10 text-center">
                <p class="font-bold uppercase">Belum ada transaksi.</p>
                <a href="{{ route('transactions.create') }}" class="btn-brutal-mint mt-3 text-xs">+ Tambah transaksi pertama</a>
            </td></tr>
        @endforelse
        </tbody>
    </table>
    </div>
</div>
@endsection
