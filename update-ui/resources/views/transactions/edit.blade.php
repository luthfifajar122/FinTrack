@extends('layouts.fintrack')
@section('title', 'Ubah Transaksi')
@section('content')
<div class="mb-5">
    <h1 class="page-title-brutal">✏️ Ubah Transaksi</h1>
    <p class="text-xs font-bold uppercase tracking-widest text-ink/60 mt-2">Perbarui data transaksi</p>
</div>
<form action="{{ route('transactions.update', $transaction) }}" method="POST" class="card-brutal p-5 md:p-6 max-w-xl space-y-4">
    @csrf @method('PUT')
    @include('transactions._form', ['transaction' => $transaction])
    <div class="flex gap-2 pt-2">
        <button class="btn-brutal-mint">Perbarui</button>
        <a href="{{ route('transactions.index') }}" class="btn-brutal-white">Kembali</a>
    </div>
</form>
@endsection
