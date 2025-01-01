<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        // Mengambil pembayaran beserta customer dan user yang terkait
        $payments = Payment::with('customer', 'user')  // Memastikan data customer dan user terambil
            ->orderBy('created_at', 'desc')  // Mengurutkan berdasarkan tanggal pembayaran terbaru
            ->get();

        return view('payments.index', compact('payments'));
    }
}
