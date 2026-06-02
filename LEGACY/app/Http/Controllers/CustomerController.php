<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the customers.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new customer.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created customer in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ssid' => 'required|string|max:255',
            'pass_wifi' => 'required|string|max:255',
            'ip_router' => 'required|string|max:255',
            'user_router' => 'required|string|max:255',
            'pass_router' => 'required|string|max:255',
            'user_pppoe' => 'required|string|max:255',
            'pass_pppoe' => 'required|string|max:255',
            'remote_address' => 'nullable|string|max:255',
            'monthly_fee' => 'required|numeric|min:0',
        ]);

        Customer::create($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified customer.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified customer.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified customer in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ssid' => 'required|string|max:255',
            'pass_wifi' => 'required|string|max:255',
            'ip_router' => 'required|string|max:255',
            'user_router' => 'required|string|max:255',
            'pass_router' => 'required|string|max:255',
            'user_pppoe' => 'required|string|max:255',
            'pass_pppoe' => 'required|string|max:255',
            'remote_address' => 'nullable|string|max:255',
            'monthly_fee' => 'required|numeric|min:0',
        ]);

        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified customer from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
