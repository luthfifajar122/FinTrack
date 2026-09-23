@extends('layouts.fintrack')
@section('title', 'Kategori')
@section('content')
<div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-5">
    <div>
        <h1 class="text-2xl md:text-3xl font-bold tracking-tight">Kategori</h1>
        <p class="text-sm text-slate-500 mt-1">Kelompokkan transaksi Anda</p>
    </div>
    <a href="{{ route('categories.create') }}" class="inline-flex items-center justify-center gap-1.5 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-xl text-sm font-medium shadow-sm hover:shadow-md hover:scale-105 transition duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
        Tambah
    </a>
</div>
<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-sm">
    <thead><tr class="text-left text-slate-500 bg-slate-50 border-b"><th class="p-3.5 font-medium">Nama</th><th class="font-medium">Tipe</th><th class="font-medium">Jumlah Transaksi</th><th class="text-center font-medium p-3.5">Aksi</th></tr></thead>
    <tbody>
    @forelse ($categories as $c)
        <tr class="border-b last:border-0 hover:bg-slate-50 transition duration-200">
            <td class="p-3.5 font-medium">{{ $c->name }}</td>
            <td><span class="inline-block px-2.5 py-1 rounded-full text-xs font-medium {{ $c->type === 'pemasukan' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">{{ ucfirst($c->type) }}</span></td>
            <td><span class="inline-block px-2.5 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600">{{ $c->transactions_count }}</span></td>
            <td class="text-center whitespace-nowrap p-3.5">
                <a href="{{ route('categories.edit', $c) }}" title="Ubah" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-blue-600 hover:bg-blue-50 hover:scale-105 transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                </a>
                <form action="{{ route('categories.destroy', $c) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kategori ini?')">
                    @csrf @method('DELETE')
                    <button title="Hapus" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-red-600 hover:bg-red-50 hover:scale-105 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="4" class="p-10 text-center">
            <p class="text-4xl mb-2">🏷️</p>
            <p class="text-slate-500 font-medium">Belum ada kategori.</p>
            <p class="text-sm text-slate-400 mt-1">Tambahkan kategori untuk mulai mencatat.</p>
        </td></tr>
    @endforelse
    </tbody>
</table>
</div>
</div>
<div class="mt-4">{{ $categories->links() }}</div>
@endsection
