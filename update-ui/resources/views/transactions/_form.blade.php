<div class="space-y-4">
<div>
    <label class="label-brutal">Tanggal Transaksi</label>
    <input type="date" name="transaction_date" value="{{ old('transaction_date', isset($transaction) ? $transaction->transaction_date->format('Y-m-d') : date('Y-m-d')) }}" class="input-brutal">
    @error('transaction_date')<p class="text-[#D92626] text-sm font-bold mt-1">⚠ {{ $message }}</p>@enderror
</div>
<div>
    <label class="label-brutal">Keterangan</label>
    <input type="text" name="description" value="{{ old('description', $transaction->description ?? '') }}" class="input-brutal" placeholder="Contoh: Gaji bulanan">
    @error('description')<p class="text-[#D92626] text-sm font-bold mt-1">⚠ {{ $message }}</p>@enderror
</div>
<div>
    <label class="label-brutal">Kategori</label>
    <select name="category_id" class="input-brutal">
        <option value="">-- Pilih --</option>
        @foreach ($categories as $c)
            <option value="{{ $c->id }}" @selected(old('category_id', $transaction->category_id ?? '') == $c->id)>{{ $c->name }} ({{ $c->type }})</option>
        @endforeach
    </select>
    @error('category_id')<p class="text-[#D92626] text-sm font-bold mt-1">⚠ {{ $message }}</p>@enderror
</div>
<div>
    <label class="label-brutal">Tipe Transaksi</label>
    <select name="type" class="input-brutal">
        <option value="pemasukan" @selected(old('type', $transaction->type ?? '') === 'pemasukan')>Pemasukan</option>
        <option value="pengeluaran" @selected(old('type', $transaction->type ?? '') === 'pengeluaran')>Pengeluaran</option>
    </select>
    @error('type')<p class="text-[#D92626] text-sm font-bold mt-1">⚠ {{ $message }}</p>@enderror
</div>
<div>
    <label class="label-brutal">Nominal (Rp)</label>
    <input type="text" inputmode="numeric" name="amount" id="amount" value="{{ old('amount', $transaction->amount ?? '') }}" class="input-brutal" placeholder="15000">
    <p class="text-xs font-medium opacity-60 mt-1.5">Ketik angka tanpa titik, contoh: 15000.</p>
    @error('amount')<p class="text-[#D92626] text-sm font-bold mt-1">⚠ {{ $message }}</p>@enderror
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
