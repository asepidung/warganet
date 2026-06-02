<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment',
        'discount',
        'status',
        'paid_at',
        'user_id',
        'bill_id',
        'customer_id',  // Menambahkan customer_id
    ];

    /**
     * Relasi ke Bill (tetap mempertahankan relasi ini)
     */
    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    /**
     * Relasi ke Customer (tambahkan relasi ke customer)
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Relasi ke User (admin yang menginput pembayaran)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
