@extends('layouts.fintrack')
@section('title', 'Tambah Kategori')
@section('content')
<div class="mb-5">
    <h1 class="page-title-brutal">+ Tambah Kategori</h1>
    <p class="text-xs font-bold uppercase tracking-widest text-ink/60 mt-2">Buat kategori baru untuk transaksi</p>
</div>
<form action="{{ route('categories.store') }}" method="POST" class="card-brutal p-5 md:p-6 max-w-xl space-y-4">
    @csrf
    @include('categories._form')
    <div class="flex gap-2 pt-2">
        <button class="btn-brutal-mint">Simpan</button>
        <a href="{{ route('categories.index') }}" class="btn-brutal-white">Kembali</a>
    </div>
</form>
@endsection
