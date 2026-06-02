<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use MoonShine\Laravel\MoonShineUI;
use MoonShine\Support\Enums\ToastType;

class ApprovePaymentController extends Controller
{
    /**
     * Setujui pembayaran (ubah status menjadi confirmed).
     */
    public function __invoke(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        
        if ($payment->status === 'waiting') {
            $payment->status = 'confirmed';
            $payment->save();
            MoonShineUI::toast('Payment approved successfully!', ToastType::SUCCESS);
        } else {
            MoonShineUI::toast('Payment is already confirmed.', ToastType::WARNING);
        }

        return back();
    }
}
