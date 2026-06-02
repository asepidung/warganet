<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MoonShine\Laravel\MoonShineUI;
use MoonShine\Support\Enums\ToastType;

class GenerateBillController extends Controller
{
    /**
     * Generate tagihan bulanan untuk customer yang masih aktif.
     */
    public function __invoke(Request $request)
    {
        $today = now();

        // Cek apakah tagihan bulan ini sudah pernah di-generate (cek created_at)
        $billsGenerated = Bill::whereYear('created_at', $today->year)
            ->whereMonth('created_at', $today->month)
            ->exists();

        if ($billsGenerated) {
            MoonShineUI::toast('Tagihan untuk bulan ini sudah pernah digenerate!', ToastType::WARNING);
            return back();
        }

        // Gunakan transaction agar konsisten
        DB::transaction(function () {
            // HANYA ambil customer yang aktif
            $customers = Customer::where('is_active', true)->get();

            foreach ($customers as $customer) {
                // Ambil tagihan terakhir untuk pelanggan ini
                $lastBill = $customer->bills()->orderBy('created_at', 'desc')->first();

                if ($lastBill) {
                    Bill::create([
                        'customer_id'  => $customer->id,
                        'monthly_fee'  => $customer->monthly_fee,
                        // Jika ada tagihan belum dibayar bulan lalu, akumulasikan
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

        MoonShineUI::toast('Tagihan berhasil digenerate untuk semua pelanggan aktif!', ToastType::SUCCESS);
        return back();
    }
}
