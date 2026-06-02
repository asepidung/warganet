<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Payment;
use App\Models\Withdrawal;
use App\Models\InitialBalance;
use App\Models\User;
use App\Models\SideIncome;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil saldo awal (pastikan hanya ada satu)
        $initialBalance = InitialBalance::first();
        $saldoAwal = $initialBalance ? $initialBalance->balance : 0;

        // Total pembayaran yang sudah dikonfirmasi
        $totalPayments = Payment::where('status', 'confirmed')->sum('payment');

        // Total pengeluaran
        $totalExpenses = Expense::sum('amount');

        // **Tambahan: Total Side Incomes**
        $totalSideIncome = SideIncome::sum('amount');

        // Total withdraw untuk masing-masing user
        $withdrawals = Withdrawal::selectRaw('user_id, SUM(amount) as total')
            ->groupBy('user_id')
            ->pluck('total', 'user_id');

        $totalWithdrawalsUser1 = $withdrawals[1] ?? 0;
        $totalWithdrawalsUser2 = $withdrawals[2] ?? 0;

        // Total pembayaran dengan status waiting
        $totalPaymentsWaiting = Payment::where('status', 'waiting')->sum('payment');

        // Total diskon bulan ini
        $totalDiscountThisMonth = Payment::where('status', 'confirmed')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('discount');

        // **Tambahan: Total Side Incomes Bulan Ini**
        $totalSideIncomeThisMonth = SideIncome::whereMonth('date', Carbon::now()->month)
            ->whereYear('date', Carbon::now()->year)
            ->sum('amount');

        // **Hitung Total Kas Baru (termasuk Side Incomes)**
        $totalKas = $saldoAwal + $totalPayments + $totalSideIncome - $totalExpenses;

        // **Bagi Total Kas ke User 1 & 2**
        $saldoUser1 = ($totalKas / 2) - $totalWithdrawalsUser1;
        $saldoUser2 = ($totalKas / 2) - $totalWithdrawalsUser2;

        // Total kas keseluruhan setelah dikurangi withdraw
        $kas = $saldoUser1 + $saldoUser2;

        // Ambil dua user pertama (jika ada lebih dari dua user)
        $users = User::take(2)->get();

        // Total pembayaran bulan ini
        $totalPaymentsThisMonth = Payment::where('status', 'confirmed')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('payment');

        // Total pengeluaran bulan ini
        $totalExpensesThisMonth = Expense::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('amount');

        // Total withdraw bulan ini per user
        $withdrawalsThisMonth = Withdrawal::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->selectRaw('user_id, SUM(amount) as total')
            ->groupBy('user_id')
            ->pluck('total', 'user_id');

        $totalWithdrawalsUser1ThisMonth = $withdrawalsThisMonth[1] ?? 0;
        $totalWithdrawalsUser2ThisMonth = $withdrawalsThisMonth[2] ?? 0;

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
            'totalSideIncomeThisMonth', // **Tambahan baru**
            'totalSideIncome', // **Tambahan baru: Total Side Income secara keseluruhan**
            'users'
        ));
    }
}
