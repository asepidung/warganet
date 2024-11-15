<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ssid',
        'wifi_password',
        'remote_ip',
        'router_ip',
        'router_user',
        'router_password',
        'pppoe_user',
        'pppoe_password',
        'monthly_fee',
    ];
}
