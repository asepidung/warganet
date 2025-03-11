<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SideIncome extends Model
{
    use HasFactory;

    protected $table = 'sideincomes'; // Nama tabel

    protected $fillable = [
        'date',
        'amount',
        'description'
    ];
}
