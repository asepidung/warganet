<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    /**
     * Tampilkan daftar tagihan.
     */
    public function index()
    {
        $today = now();

        // Cek apakah tagihan bulan ini sudah pernah digenerate
        $billsGenerated = Bill::whereYear('updated_at', $today->year)
            ->whereMonth('updated_at', $today->month)
            ->exists();

        // Ambil data pelanggan beserta tagihan mereka
        $customers = Customer::with('bills')->get();

        return view('billings.index', compact('customers', 'billsGenerated'));
    }

    /**
     * Generate tagihan untuk bulan ini.
     */
    public function generate()
    {
        $today = now();
    
        // Cek apakah tagihan bulan ini sudah pernah di-generate
        $billsGenerated = Bill::whereYear('updated_at', $today->year)
            ->whereMonth('updated_at', $today->month)
            ->exists();
    
        if ($billsGenerated) {
            return redirect()->route('billing.index')->with('info', 'Bills for this month have already been generated.');
        }
    
        // Proses untuk setiap pelanggan
        $customers = Customer::all();
        foreach ($customers as $customer) {
            // Ambil tagihan terakhir untuk pelanggan ini
            $lastBill = $customer->bills()->orderBy('created_at', 'desc')->first();
    
            if ($lastBill) {
                // Update tagihan yang ada dengan menambahkan monthly_fee ke bill_total
                $lastBill->bill_total += $customer->monthly_fee;
    
                // Ubah status menjadi no_payment
                $lastBill->status = 'no_payment';
    
                $lastBill->save();
            } else {
                // Jika tidak ada tagihan sebelumnya, buat tagihan pertama kali
                Bill::create([
                    'customer_id' => $customer->id,
                    'monthly_fee' => $customer->monthly_fee,
                    'bill_total' => $customer->monthly_fee, // Tagihan pertama
                    'status' => 'no_payment',
                ]);
            }
        }
    
        return redirect()->route('billing.index')->with('success', 'Bills for this month have been generated successfully.');
    }
    
    public function show($id)
    {
        $bill = Bill::with('customer')->findOrFail($id);
        return view('billings.show', compact('bill'));
    }

    /**
     * Simpan pembayaran dan update tagihan.
     */
    public function storePayment(Request $request, $id)
    {
        $bill = Bill::findOrFail($id);

        // Validasi input pembayaran
        $request->validate([
            'payment' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
        ]);

        // Simpan pembayaran
        $payment = Payment::create([
            'bill_id' => $bill->id,
            'payment' => $request->payment,
            'discount' => $request->discount ?? 0,
            'status' => 'waiting',
            'paid_at' => now(),
            'user_id' => Auth::id(),
            'customer_id' => $bill->customer_id,  // Menyimpan customer_id dari bill
        ]);

        // Update tagihan
        $bill->bill_total -= ($request->payment + $request->discount);
        // Menetapkan status berdasarkan sisa tagihan
        $bill->status = $bill->bill_total > 0 ? 'partial_payment' : 'fully_paid';
        $bill->save();

        // Redirect ke halaman billing.index setelah pembayaran berhasil
        return redirect()->route('billing.index')->with('success', 'Payment successfully recorded!');
    }


    /**
     * Konfirmasi pembayaran.
     */
    public function confirmPayment($paymentId)
    {
        $payment = Payment::findOrFail($paymentId);
        $payment->status = 'confirmed';
        $payment->save();

        // Update status tagihan
        $bill = $payment->bill;
        $bill->status = $bill->bill_total > 0 ? 'partial_payment' : 'fully_paid';
        $bill->save();

        // Redirect ke halaman daftar pembayaran
        return redirect()->route('payments.index')->with('success', 'Payment confirmed successfully!');
    }

    /**
     * Helper function to format status
     */
    public function formatStatus($status)
    {
        switch ($status) {
            case 'partial_payment':
                return 'Partial Payment';
            case 'fully_paid':
                return 'Fully Paid';
            case 'no_payment':
                return 'No Payment';
            default:
                return ucfirst(str_replace('_', ' ', $status)); // Default case
        }
    }
}
