<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Menghitung total saldo sistem keseluruhan.
     */
    public static function getTotalSystemBalance(): float
    {
        $initialBalance = \App\Models\InitialBalance::sum('balance');
        $totalPayments = \App\Models\Payment::where('status', 'confirmed')->sum('payment');
        $totalSideIncomes = \App\Models\SideIncome::sum('amount');
        $totalExpenses = \App\Models\Expense::sum('amount');

        return ($initialBalance + $totalPayments + $totalSideIncomes) - $totalExpenses;
    }

    /**
     * Menghitung hak saldo/uang dari user ini berdasarkan pembagian rata (dibagi 2) dikurangi penarikan pribadinya.
     */
    public function getShareBalance(): float
    {
        $systemBalance = self::getTotalSystemBalance();
        
        // Asumsi pembagian rata 50-50 antara Asep dan Prima (dibagi 2)
        $share = $systemBalance / 2;

        // Dikurangi total withdraw yang sudah ditarik oleh user ini
        $myWithdrawals = \App\Models\Withdrawal::where('user_id', $this->id)->sum('amount');

        return $share - $myWithdrawals;
    }
}
