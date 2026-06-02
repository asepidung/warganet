<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MoonShine\Laravel\MoonShineUI;
use MoonShine\Support\Enums\ToastType;

class StorePaymentController extends Controller
{
    /**
     * Simpan pembayaran (metode cicil) dan update tagihan.
     */
    public function __invoke(Request $request, $id)
    {
        $bill = Bill::findOrFail($id);

        // Hapus koma (separator ribuan) sebelum divalidasi
        $request->merge([
            'payment' => str_replace(',', '', $request->input('payment', '')),
            'discount' => str_replace(',', '', $request->input('discount', '')),
        ]);

        $request->validate([
            'payment'  => 'required|numeric|min:1',
            'discount' => 'nullable|numeric|min:0',
        ]);

        DB::transaction(function () use ($request, $bill) {
            $paymentAmount = $request->input('payment');
            $discountAmount = $request->input('discount', 0);

            // Karena MoonShine auth menggunakan guard moonshine
            $userId = auth('moonshine')->id() ?? 1;

            Payment::create([
                'bill_id'     => $bill->id,
                'payment'     => $paymentAmount,
                'discount'    => $discountAmount,
                'status'      => 'waiting', // legacy code uses waiting
                'paid_at'     => now(),
                'user_id'     => $userId,
                'customer_id' => $bill->customer_id,
            ]);

            // Update bill_total dan status
            $bill->bill_total -= ($paymentAmount + $discountAmount);
            // Cegah total tagihan menjadi minus
            if ($bill->bill_total < 0) {
                $bill->bill_total = 0;
            }
            
            $bill->status = $bill->bill_total > 0 ? 'partial_payment' : 'fully_paid';
            $bill->save();
        });

        MoonShineUI::toast('Payment successfully recorded!', ToastType::SUCCESS);
        
        return back();
    }
}
