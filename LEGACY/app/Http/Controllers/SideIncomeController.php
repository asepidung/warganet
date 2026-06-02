<?php

namespace App\Http\Controllers;

use App\Models\SideIncome;
use Illuminate\Http\Request;

class SideIncomeController extends Controller
{
    // Menampilkan daftar pemasukan tambahan
    public function index()
    {
        $sideincomes = SideIncome::orderBy('date', 'DESC')->get();
        return view('sideincomes.index', compact('sideincomes'));
    }

    // Menampilkan form tambah pemasukan
    public function create()
    {
        return view('sideincomes.create');
    }

    // Menyimpan data pemasukan
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
        ]);

        SideIncome::create($request->all());

        return redirect()->route('sideincomes.index')->with('success', 'Pemasukan tambahan berhasil ditambahkan!');
    }

    // Menampilkan form edit pemasukan
    public function edit($id)
    {
        $sideincome = SideIncome::findOrFail($id);
        return view('sideincomes.edit', compact('sideincome'));
    }

    // Memperbarui data pemasukan
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
        ]);

        $sideincome = SideIncome::findOrFail($id);
        $sideincome->update($request->all());

        return redirect()->route('sideincomes.index')->with('success', 'Pemasukan tambahan berhasil diperbarui!');
    }

    // Menghapus pemasukan
    public function destroy($id)
    {
        $sideincome = SideIncome::findOrFail($id);
        $sideincome->delete();

        return redirect()->route('sideincomes.index')->with('success', 'Pemasukan tambahan berhasil dihapus!');
    }
}
