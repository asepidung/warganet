<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BillingController extends Controller
{
    /**
     * Tampilkan daftar tagihan.
     */
    public function index()
    {
        $today = now();

        // Cek apakah tagihan bulan ini sudah pernah digenerate
        $billsGenerated = Bill::whereYear('created_at', $today->year)
            ->whereMonth('created_at', $today->month)
            ->exists();

        // Ambil semua customer beserta last bill mereka (optimasi: ambil sekali)
        $customers = Customer::with('bills')->get()->map(function ($customer) {
            // ambil last bill berdasarkan created_at
            $lastBill = $customer->bills->sortByDesc('created_at')->first();
            // tambah properti last_bill agar mudah diakses di view
            $customer->last_bill = $lastBill;
            return $customer;
        });

        return view('billings.index', compact('customers', 'billsGenerated'));
    }

    /**
     * Generate tagihan untuk bulan ini.
     */
    public function generate()
    {
        $today = now();

        // Cek apakah tagihan bulan ini sudah pernah di-generate (cek created_at)
        $billsGenerated = Bill::whereYear('created_at', $today->year)
            ->whereMonth('created_at', $today->month)
            ->exists();

        if ($billsGenerated) {
            return redirect()->route('billing.index')->with('info', 'Bills for this month have already been generated.');
        }

        // Gunakan transaction agar konsisten
        DB::transaction(function () {
            $customers = Customer::all();

            foreach ($customers as $customer) {
                // Ambil tagihan terakhir untuk pelanggan ini
                $lastBill = $customer->bills()->orderBy('created_at', 'desc')->first();

                if ($lastBill) {
                    /**
                     * Pilihan desain:
                     * - Update bill terakhir dengan menambahkan monthly_fee (seperti sebelumnya)
                     * - ATAU buat bill baru setiap bulan (lebih rapi untuk audit/history)
                     *
                     * Saya akan membuat bill baru setiap bulan agar histori jelas.
                     */
                    Bill::create([
                        'customer_id'  => $customer->id,
                        'monthly_fee'  => $customer->monthly_fee,
                        'bill_total'   => $lastBill->bill_total + $customer->monthly_fee,
                        'status'       => 'no_payment',
                    ]);
                } else {
                    // Jika tidak ada tagihan sebelumnya, buat tagihan pertama kali
                    Bill::create([
                        'customer_id'  => $customer->id,
                        'monthly_fee'  => $customer->monthly_fee,
                        'bill_total'   => $customer->monthly_fee,
                        'status'       => 'no_payment',
                    ]);
                }
            }
        });

        return redirect()->route('billing.index')->with('success', 'Bills for this month have been generated successfully.');
    }

    public function show($id)
    {
        $bill = Bill::with('customer', 'payments')->findOrFail($id);
        return view('billings.show', compact('bill'));
    }

    /**
     * Simpan pembayaran dan update tagihan.
     */
    public function storePayment(Request $request, $id)
    {
        $bill = Bill::findOrFail($id);

        $request->validate([
            'payment'  => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
        ]);

        DB::transaction(function () use ($request, $bill) {
            $payment = Payment::create([
                'bill_id'     => $bill->id,
                'payment'     => $request->payment,
                'discount'    => $request->discount ?? 0,
                'status'      => 'waiting',
                'paid_at'     => now(),
                'user_id'     => Auth::id(),
                'customer_id' => $bill->customer_id,
            ]);

            // Update bill_total dan status
            $bill->bill_total -= ($request->payment + ($request->discount ?? 0));
            $bill->status = $bill->bill_total > 0 ? 'partial_payment' : 'fully_paid';
            $bill->save();
        });

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

        return redirect()->route('payments.index')->with('success', 'Payment confirmed successfully!');
    }

    /**
     * Helper function to format status (bisa dipakai juga di view jika perlu).
     */
    public static function formatStatus($status)
    {
        switch ($status) {
            case 'partial_payment':
                return 'Partial Payment';
            case 'fully_paid':
                return 'Fully Paid';
            case 'no_payment':
                return 'No Payment';
            default:
                return ucfirst(str_replace('_', ' ', $status));
        }
    }
}
