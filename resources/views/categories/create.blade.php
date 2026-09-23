@extends('layouts.fintrack')
@section('title', 'Tambah Kategori')
@section('content')
<div class="mb-5">
    <h1 class="text-2xl md:text-3xl font-bold tracking-tight">Tambah Kategori</h1>
    <p class="text-sm text-slate-500 mt-1">Buat kategori baru untuk transaksi</p>
</div>
<form action="{{ route('categories.store') }}" method="POST" class="bg-white p-5 md:p-6 rounded-2xl shadow-sm max-w-xl space-y-4">
    @csrf
    @include('categories._form')
    <div class="flex gap-2 pt-2">
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium shadow-sm hover:shadow-md hover:scale-105 transition duration-200">Simpan</button>
        <a href="{{ route('categories.index') }}" class="px-5 py-2.5 border border-slate-200 rounded-xl text-sm font-medium hover:bg-slate-100 transition duration-200">Kembali</a>
    </div>
</form>
@endsection
