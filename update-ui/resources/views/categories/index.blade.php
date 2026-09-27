@extends('layouts.fintrack')
@section('title', 'Kategori')
@section('content')
<div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-5">
    <div>
        <h1 class="page-title-brutal">Kategori</h1>
        <p class="text-xs font-bold uppercase tracking-widest text-ink/60 mt-2">Kelompokkan transaksi Anda</p>
    </div>
    <a href="{{ route('categories.create') }}" class="btn-brutal-mint">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
        Tambah
    </a>
</div>
<div class="card-brutal overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-sm table-brutal">
    <thead><tr class="text-left"><th class="p-3.5 font-bold uppercase text-xs tracking-widest">Nama</th><th class="font-bold uppercase text-xs tracking-widest">Tipe</th><th class="font-bold uppercase text-xs tracking-widest">Jumlah Transaksi</th><th class="text-center font-bold uppercase text-xs tracking-widest p-3.5">Aksi</th></tr></thead>
    <tbody>
    @forelse ($categories as $c)
        <tr>
            <td class="p-3.5 font-bold">{{ $c->name }}</td>
            <td><span class="badge-brutal {{ $c->type === 'pemasukan' ? 'bg-mint' : 'bg-[#FF6B6B] text-white' }}">{{ ucfirst($c->type) }}</span></td>
            <td><span class="badge-brutal bg-white">{{ $c->transactions_count }}</span></td>
            <td class="text-center whitespace-nowrap p-3.5">
                <a href="{{ route('categories.edit', $c) }}" title="Ubah" class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-white border-2 border-ink shadow-brutal-sm hover:bg-mint hover:-translate-y-0.5 hover:shadow-brutal transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                </a>
                <form action="{{ route('categories.destroy', $c) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kategori ini?')">
                    @csrf @method('DELETE')
                    <button title="Hapus" class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-white border-2 border-ink shadow-brutal-sm hover:bg-[#FF6B6B] hover:text-white hover:-translate-y-0.5 hover:shadow-brutal transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="4" class="p-10 text-center">
            <p class="text-4xl mb-2">🏷️</p>
            <p class="font-bold uppercase">Belum ada kategori.</p>
            <p class="text-sm font-medium opacity-60 mt-1">Tambahkan kategori untuk mulai mencatat.</p>
        </td></tr>
    @endforelse
    </tbody>
</table>
</div>
</div>
<div class="mt-4">{{ $categories->links() }}</div>
@endsection
