@extends('layouts.fintrack')
@section('title', 'Dashboard')
@section('content')
<div class="mb-6">
    <h1 class="text-2xl md:text-3xl font-bold tracking-tight">Dashboard</h1>
    <p class="text-sm text-slate-500 mt-1">Ringkasan keuangan pribadi Anda</p>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-white p-5 rounded-2xl shadow-sm border-l-4 border-blue-500 hover:shadow-md hover:scale-[1.02] transition duration-300">
        <p class="text-sm text-slate-500 mb-1">Total Saldo</p>
        <p class="text-xl font-bold">{{ format_rupiah($saldo) }}</p>
    </div>
    <div class="bg-white p-5 rounded-2xl shadow-sm border-l-4 border-green-500 hover:shadow-md hover:scale-[1.02] transition duration-300">
        <p class="text-sm text-slate-500 mb-1">Total Pemasukan</p>
        <p class="text-xl font-bold text-green-600">{{ format_rupiah($totalPemasukan) }}</p>
    </div>
    <div class="bg-white p-5 rounded-2xl shadow-sm border-l-4 border-red-500 hover:shadow-md hover:scale-[1.02] transition duration-300">
        <p class="text-sm text-slate-500 mb-1">Total Pengeluaran</p>
        <p class="text-xl font-bold text-red-600">{{ format_rupiah($totalPengeluaran) }}</p>
    </div>
    <div class="bg-white p-5 rounded-2xl shadow-sm border-l-4 border-violet-500 hover:shadow-md hover:scale-[1.02] transition duration-300">
        <p class="text-sm text-slate-500 mb-1">Jumlah Transaksi</p>
        <p class="text-xl font-bold">{{ $jumlahTransaksi }}</p>
    </div>
</div>
<div class="bg-white p-5 md:p-6 rounded-2xl shadow-sm">
    <div class="flex items-center justify-between mb-4">
        <h2 class="font-semibold text-lg">5 Transaksi Terbaru</h2>
        <a href="{{ route('transactions.index') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium transition duration-200">Lihat semua →</a>
    </div>
    <div class="overflow-x-auto -mx-5 md:mx-0 px-5 md:px-0">
    <table class="w-full text-sm">
        <thead><tr class="text-left text-slate-500 border-b"><th class="py-2.5 pr-3 font-medium">Tanggal</th><th class="pr-3 font-medium">Keterangan</th><th class="pr-3 font-medium">Kategori</th><th class="pr-3 font-medium">Tipe</th><th class="text-right font-medium">Nominal</th></tr></thead>
        <tbody>
        @forelse ($transaksiTerbaru as $t)
            <tr class="border-b last:border-0 hover:bg-slate-50 transition duration-200">
                <td class="py-3 pr-3 whitespace-nowrap">{{ $t->transaction_date->format('d-m-Y') }}</td>
                <td class="pr-3">{{ $t->description }}</td>
                <td class="pr-3">{{ $t->category->name ?? '-' }}</td>
                <td class="pr-3"><span class="inline-block px-2.5 py-1 rounded-full text-xs font-medium {{ $t->type === 'pemasukan' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">{{ ucfirst($t->type) }}</span></td>
                <td class="text-right font-semibold whitespace-nowrap">{{ format_rupiah($t->amount) }}</td>
            </tr>
        @empty
            <tr><td colspan="5" class="py-10 text-center">
                <p class="text-4xl mb-2">📭</p>
                <p class="text-slate-500 font-medium">Belum ada transaksi.</p>
                <a href="{{ route('transactions.create') }}" class="inline-block mt-3 text-sm text-blue-600 hover:text-blue-800 font-medium transition duration-200">+ Tambah transaksi pertama</a>
            </td></tr>
        @endforelse
        </tbody>
    </table>
    </div>
</div>
@endsection
