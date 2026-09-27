<div class="space-y-4">
<div>
    <label class="label-brutal">Nama Kategori</label>
    <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" class="input-brutal" placeholder="Contoh: Gaji, Makan">
    @error('name')<p class="text-[#D92626] text-sm font-bold mt-1">⚠ {{ $message }}</p>@enderror
</div>
<div>
    <label class="label-brutal">Tipe</label>
    <select name="type" class="input-brutal">
        <option value="pemasukan" @selected(old('type', $category->type ?? '') === 'pemasukan')>Pemasukan</option>
        <option value="pengeluaran" @selected(old('type', $category->type ?? '') === 'pengeluaran')>Pengeluaran</option>
    </select>
    @error('type')<p class="text-[#D92626] text-sm font-bold mt-1">⚠ {{ $message }}</p>@enderror
</div>
</div>
