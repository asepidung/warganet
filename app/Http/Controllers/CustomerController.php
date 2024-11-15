<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Menampilkan daftar pelanggan
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    // Menampilkan form untuk menambah pelanggan baru
    public function create()
    {
        return view('customers.create');
    }

    // Menyimpan data pelanggan baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ssid' => 'nullable|string|max:255',
            'wifi_password' => 'nullable|string|max:255',
            'remote_ip' => 'nullable|string|max:255',
            'router_ip' => 'nullable|string|max:255',
            'router_user' => 'nullable|string|max:255',
            'router_password' => 'nullable|string|max:255',
            'pppoe_user' => 'nullable|string|max:255',
            'pppoe_password' => 'nullable|string|max:255',
            'monthly_fee' => 'nullable|numeric',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    // Menampilkan form untuk mengedit pelanggan
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    // Memperbarui data pelanggan
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ssid' => 'nullable|string|max:255',
            'wifi_password' => 'nullable|string|max:255',
            'remote_ip' => 'nullable|string|max:255',
            'router_ip' => 'nullable|string|max:255',
            'router_user' => 'nullable|string|max:255',
            'router_password' => 'nullable|string|max:255',
            'pppoe_user' => 'nullable|string|max:255',
            'pppoe_password' => 'nullable|string|max:255',
            'monthly_fee' => 'nullable|numeric',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    // app/Http/Controllers/CustomerController.php

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }


    // Menghapus data pelanggan
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
