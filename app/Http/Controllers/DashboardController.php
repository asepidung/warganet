<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Payment;
use App\Models\Withdrawal;
use App\Models\InitialBalance;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil saldo awal (jika ada)
        $initialBalance = InitialBalance::first(); // Pastikan saldo awal hanya 1 baris

        // Ambil total pembayaran yang sudah dikonfirmasi
        $totalPayments = Payment::where('status', 'confirmed')->sum('payment');

        // Ambil total pengeluaran (expenses)
        $totalExpenses = Expense::sum('amount');

        // Ambil total withdraw untuk masing-masing user
        $totalWithdrawalsUser1 = Withdrawal::where('user_id', 1)->sum('amount');
        $totalWithdrawalsUser2 = Withdrawal::where('user_id', 2)->sum('amount');

        // Total pembayaran dengan status waiting
        $totalPaymentsWaiting = Payment::where('status', 'waiting')->sum('payment');

        // Total diskon bulan ini
        $totalDiscountThisMonth = Payment::where('status', 'confirmed')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('discount');

        // Hitung total kas (saldo awal + pembayaran - pengeluaran)
        $totalKas = ($initialBalance ? $initialBalance->balance : 0) + $totalPayments - $totalExpenses;

        // Hitung saldo untuk User 1 dan User 2
        $saldoUser1 = ($totalKas / 2) - $totalWithdrawalsUser1;
        $saldoUser2 = ($totalKas / 2) - $totalWithdrawalsUser2;

        // Kas total adalah jumlah saldo user1 dan user2
        $kas = $saldoUser1 + $saldoUser2;

        // Ambil data user
        $users = User::take(2)->get(); // Mengambil dua user pertama

        // Total payments bulan ini
        $totalPaymentsThisMonth = Payment::where('status', 'confirmed')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('payment');

        // Total expenses bulan ini
        $totalExpensesThisMonth = Expense::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('amount');

        // Total withdraw bulan ini per user
        $totalWithdrawalsUser1ThisMonth = Withdrawal::where('user_id', 1)
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('amount');

        $totalWithdrawalsUser2ThisMonth = Withdrawal::where('user_id', 2)
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('amount');

        return view('dashboard', compact(
            'kas',
            'saldoUser1',
            'saldoUser2',
            'totalPayments',
            'totalExpenses',
            'totalWithdrawalsUser1',
            'totalWithdrawalsUser2',
            'totalPaymentsThisMonth',
            'totalExpensesThisMonth',
            'totalDiscountThisMonth',
            'totalPaymentsWaiting',
            'totalWithdrawalsUser1ThisMonth',
            'totalWithdrawalsUser2ThisMonth',
            'users'
        ));
    }
}
