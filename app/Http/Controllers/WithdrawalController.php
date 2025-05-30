<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{


    public function index()
    {
        $withdrawals = Withdrawal::with('user')
            ->orderBy('withdrawal_date', 'desc') // Data terbaru di atas
            ->get();
        return view('withdrawals.index', compact('withdrawals'));
    }

    public function create()
    {
        $users = User::all(); // Ambil semua pengguna
        return view('withdrawals.create', compact('users'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
            'withdrawal_date' => 'required|date',
            'note' => 'nullable|string',
        ]);

        // Menyimpan data withdrawal
        Withdrawal::create([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'withdrawal_date' => $request->withdrawal_date,
            'note' => $request->note,
        ]);

        return redirect()->route('withdrawals.index')->with('success', 'Withdrawal berhasil dilakukan');
    }

    public function show($id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
        return view('withdrawals.show', compact('withdrawal'));
    }

    public function destroy($id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
        $withdrawal->delete();

        return redirect()->route('withdrawals.index')
            ->with('success', 'Withdrawal berhasil dihapus!');
    }
}
