<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'customer_id',
        'monthly_fee',
        'bill_total',
        'status',
    ];

    /**
     * Relasi ke model Customer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Relasi ke model Payment (satu bill bisa punya banyak payment).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany(\App\Models\Payment::class);
    }

    /**
     * Helper: ambil payment terakhir (jika perlu).
     * Menggunakan latestOfMany agar langsung dapat satu record paling baru.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function latestPayment()
    {
        // Jika Laravel version tidak mendukung latestOfMany,
        // fallback bisa dengan ->hasMany(...)->latest()->limit(1)
        return $this->hasOne(\App\Models\Payment::class)->latestOfMany();
    }
}
