<div class="space-y-4">
<div>
    <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Kategori</label>
    <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" class="border border-slate-200 rounded-xl px-3.5 py-2.5 w-full text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200" placeholder="Contoh: Gaji, Makan">
    @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
</div>
<div>
    <label class="block text-sm font-medium text-slate-700 mb-1.5">Tipe</label>
    <select name="type" class="border border-slate-200 rounded-xl px-3.5 py-2.5 w-full text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200 bg-white">
        <option value="pemasukan" @selected(old('type', $category->type ?? '') === 'pemasukan')>Pemasukan</option>
        <option value="pengeluaran" @selected(old('type', $category->type ?? '') === 'pengeluaran')>Pengeluaran</option>
    </select>
    @error('type')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
</div>
</div>
