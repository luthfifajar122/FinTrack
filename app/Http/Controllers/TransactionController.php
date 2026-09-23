<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('name')->get();

        $transactions = Transaction::with('category')
            ->where('user_id', $request->user()->id)
            ->when($request->type, fn ($q, $v) => $q->where('type', $v))
            ->when($request->category_id, fn ($q, $v) => $q->where('category_id', $v))
            ->when($request->start_date, fn ($q, $v) => $q->whereDate('transaction_date', '>=', $v))
            ->when($request->end_date, fn ($q, $v) => $q->whereDate('transaction_date', '<=', $v))
            ->when($request->search, fn ($q, $v) => $q->where('description', 'like', "%{$v}%"))
            ->latest('transaction_date')->latest('id')
            ->paginate(10)->withQueryString();

        return view('transactions.index', compact('transactions', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('transactions.create', compact('categories'));
    }

    public function store(TransactionRequest $request)
    {
        Transaction::create($request->validated() + ['user_id' => $request->user()->id]);

        return redirect()->route('transactions.index')->with('sukses', 'Transaksi berhasil ditambah.');
    }

    public function edit(Transaction $transaction)
    {
        abort_if($transaction->user_id !== Auth::id(), 403);
        $categories = Category::orderBy('name')->get();

        return view('transactions.edit', compact('transaction', 'categories'));
    }

    public function update(TransactionRequest $request, Transaction $transaction)
    {
        abort_if($transaction->user_id !== Auth::id(), 403);
        $transaction->update($request->validated());

        return redirect()->route('transactions.index')->with('sukses', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(Transaction $transaction)
    {
        abort_if($transaction->user_id !== Auth::id(), 403);
        $transaction->delete();

        return redirect()->route('transactions.index')->with('sukses', 'Transaksi berhasil dihapus.');
    }
}
