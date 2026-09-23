@extends('layouts.fintrack')
@section('title', 'Ubah Transaksi')
@section('content')
<div class="mb-5">
    <h1 class="text-2xl md:text-3xl font-bold tracking-tight">Ubah Transaksi</h1>
    <p class="text-sm text-slate-500 mt-1">Perbarui data transaksi</p>
</div>
<form action="{{ route('transactions.update', $transaction) }}" method="POST" class="bg-white p-5 md:p-6 rounded-2xl shadow-sm max-w-xl space-y-4">
    @csrf @method('PUT')
    @include('transactions._form', ['transaction' => $transaction])
    <div class="flex gap-2 pt-2">
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium shadow-sm hover:shadow-md hover:scale-105 transition duration-200">Perbarui</button>
        <a href="{{ route('transactions.index') }}" class="px-5 py-2.5 border border-slate-200 rounded-xl text-sm font-medium hover:bg-slate-100 transition duration-200">Kembali</a>
    </div>
</form>
@endsection
