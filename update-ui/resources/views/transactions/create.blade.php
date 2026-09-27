@extends('layouts.fintrack')
@section('title', 'Tambah Transaksi')
@section('content')
<div class="mb-5">
    <h1 class="page-title-brutal">+ Tambah Transaksi</h1>
    <p class="text-xs font-bold uppercase tracking-widest text-ink/60 mt-2">Catat pemasukan atau pengeluaran baru</p>
</div>
<form action="{{ route('transactions.store') }}" method="POST" class="card-brutal p-5 md:p-6 max-w-xl space-y-4">
    @csrf
    @include('transactions._form')
    <div class="flex gap-2 pt-2">
        <button class="btn-brutal-mint">Simpan</button>
        <a href="{{ route('transactions.index') }}" class="btn-brutal-white">Kembali</a>
    </div>
</form>
@endsection
