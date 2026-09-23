<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('amount') && $this->input('amount') !== null) {
            $cleaned = preg_replace('/[^0-9]/', '', (string) $this->input('amount'));
            $this->merge(['amount' => $cleaned === '' ? null : (int) $cleaned]);
        }
    }

    public function rules(): array
    {
        return [
            'transaction_date' => ['required', 'date'],
            'description' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'type' => ['required', Rule::in(['pemasukan', 'pengeluaran'])],
            'amount' => ['required', 'numeric', 'min:1'],
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $category = $this->category_id
                ? \App\Models\Category::find($this->category_id)
                : null;
            if ($category && $category->type !== $this->type) {
                $validator->errors()->add('type', 'Tipe transaksi harus sama dengan tipe kategori (' . $category->type . ').');
            }
        });
    }

    public function messages(): array
    {
        return [
            'transaction_date.required' => 'Tanggal transaksi wajib diisi.',
            'description.required' => 'Keterangan wajib diisi.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'type.required' => 'Tipe transaksi wajib dipilih.',
            'amount.required' => 'Nominal wajib diisi.',
            'amount.min' => 'Nominal minimal Rp 1.',
        ];
    }
}
