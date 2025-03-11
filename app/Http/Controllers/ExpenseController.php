<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    // Method untuk menampilkan daftar pengeluaran
    public function index()
    {
        $expenses = Expense::with('user')->orderBy('created_at', 'DESC')->get();
        return view('expenses.index', compact('expenses'));
    }


    // Method untuk menampilkan halaman form create
    public function create()
    {
        // Menampilkan halaman form untuk menambah pengeluaran baru
        return view('expenses.create');
    }

    // Method untuk menyimpan pengeluaran baru
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        Expense::create([
            'user_id' => Auth::id(),
            'description' => $request->description,
            'amount' => $request->amount,
        ]);

        // Menambahkan pesan flash
        session()->flash('success', 'Expense added successfully!');

        return redirect()->route('expenses.index');
    }

    public function edit($id)
    {
        // Ambil data pengeluaran berdasarkan ID
        $expense = Expense::findOrFail($id);

        // Menampilkan halaman form untuk mengedit pengeluaran
        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, $id)
    {
        $expense = Expense::findOrFail($id);

        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        $expense->update([
            'description' => $request->description,
            'amount' => $request->amount,
        ]);

        // Menambahkan pesan flash
        session()->flash('success', 'Expense updated successfully!');

        return redirect()->route('expenses.index');
    }

    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        // Menambahkan pesan flash
        session()->flash('success', 'Expense deleted successfully!');

        return redirect()->route('expenses.index');
    }
}
