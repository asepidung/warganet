<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'ssid',
        'pass_wifi',
        'ip_router',
        'user_router',
        'pass_router',
        'user_pppoe',
        'pass_pppoe',
        'remote_address',
        'monthly_fee',
    ];
    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
