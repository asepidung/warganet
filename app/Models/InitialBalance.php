<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InitialBalance extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'initial_balances'; // Menyesuaikan dengan tabel di database

    // Tentukan kolom yang bisa diisi
    protected $fillable = ['balance'];  // Kolom yang dapat diisi pada tabel

    // Jika tidak menggunakan timestamps, bisa matikan dengan menambahkan:
    public $timestamps = true; // Menyesuaikan dengan apakah ada kolom `created_at` dan `updated_at`
}
