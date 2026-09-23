<div class="space-y-4">
<div>
    <label class="block text-sm font-medium text-slate-700 mb-1.5">Tanggal Transaksi</label>
    <input type="date" name="transaction_date" value="{{ old('transaction_date', isset($transaction) ? $transaction->transaction_date->format('Y-m-d') : date('Y-m-d')) }}" class="border border-slate-200 rounded-xl px-3.5 py-2.5 w-full text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
    @error('transaction_date')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
</div>
<div>
    <label class="block text-sm font-medium text-slate-700 mb-1.5">Keterangan</label>
    <input type="text" name="description" value="{{ old('description', $transaction->description ?? '') }}" class="border border-slate-200 rounded-xl px-3.5 py-2.5 w-full text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200" placeholder="Contoh: Gaji bulanan">
    @error('description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
</div>
<div>
    <label class="block text-sm font-medium text-slate-700 mb-1.5">Kategori</label>
    <select name="category_id" class="border border-slate-200 rounded-xl px-3.5 py-2.5 w-full text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200 bg-white">
        <option value="">-- Pilih --</option>
        @foreach ($categories as $c)
            <option value="{{ $c->id }}" @selected(old('category_id', $transaction->category_id ?? '') == $c->id)>{{ $c->name }} ({{ $c->type }})</option>
        @endforeach
    </select>
    @error('category_id')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
</div>
<div>
    <label class="block text-sm font-medium text-slate-700 mb-1.5">Tipe Transaksi</label>
    <select name="type" class="border border-slate-200 rounded-xl px-3.5 py-2.5 w-full text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200 bg-white">
        <option value="pemasukan" @selected(old('type', $transaction->type ?? '') === 'pemasukan')>Pemasukan</option>
        <option value="pengeluaran" @selected(old('type', $transaction->type ?? '') === 'pengeluaran')>Pengeluaran</option>
    </select>
    @error('type')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
</div>
<div>
    <label class="block text-sm font-medium text-slate-700 mb-1.5">Nominal (Rp)</label>
    <input type="text" inputmode="numeric" name="amount" id="amount" value="{{ old('amount', $transaction->amount ?? '') }}" class="border border-slate-200 rounded-xl px-3.5 py-2.5 w-full text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200" placeholder="15000">
    <p class="text-xs text-slate-400 mt-1.5">Ketik angka tanpa titik, contoh: 15000.</p>
    @error('amount')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
</div>
</div>
<script>
(function () {
    var el = document.getElementById('amount');
    if (!el) return;
    el.addEventListener('input', function () {
        var digits = el.value.replace(/[^0-9]/g, '');
        if (digits !== el.value) el.value = digits;
    });
})();
</script>
