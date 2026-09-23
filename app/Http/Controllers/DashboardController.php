<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $totalPemasukan = (int) Transaction::where('user_id', $userId)->where('type', 'pemasukan')->sum('amount');
        $totalPengeluaran = (int) Transaction::where('user_id', $userId)->where('type', 'pengeluaran')->sum('amount');
        $saldo = $totalPemasukan - $totalPengeluaran;
        $jumlahTransaksi = Transaction::where('user_id', $userId)->count();
        $transaksiTerbaru = Transaction::with('category')->where('user_id', $userId)->latest('transaction_date')->latest('id')->take(5)->get();

        return view('dashboard.index', compact(
            'totalPemasukan', 'totalPengeluaran', 'saldo', 'jumlahTransaksi', 'transaksiTerbaru'
        ));
    }
}
