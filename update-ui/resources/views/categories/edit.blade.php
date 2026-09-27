@extends('layouts.fintrack')
@section('title', 'Ubah Kategori')
@section('content')
<div class="mb-5">
    <h1 class="page-title-brutal">✏️ Ubah Kategori</h1>
    <p class="text-xs font-bold uppercase tracking-widest text-ink/60 mt-2">Perbarui data kategori</p>
</div>
<form action="{{ route('categories.update', $category) }}" method="POST" class="card-brutal p-5 md:p-6 max-w-xl space-y-4">
    @csrf @method('PUT')
    @include('categories._form', ['category' => $category])
    <div class="flex gap-2 pt-2">
        <button class="btn-brutal-mint">Perbarui</button>
        <a href="{{ route('categories.index') }}" class="btn-brutal-white">Kembali</a>
    </div>
</form>
@endsection
